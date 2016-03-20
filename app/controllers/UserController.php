<?php
class UserController extends BaseController {
	
	/*
	*/
	function index()
	{
		$user=Sentry::getUser();
		$data['adds']=Adds::getAddsByUser($user->id);
		return View::make('adds.my_adds',$data);	
	}
	/*
		* check against db
	*/
	public function login()
	{
		
        $input = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        $validator = Validator::make(
            $input,
            array(
                'email' => 'required|email',
                'password' => 'required',
            )
        );

        if ($validator->fails()) {
            
            echo json_encode(array('message'=>'All fields required...'));
			die();
        }

        $user = null;
        $message = '';
        try {

            $user = User::authenticate($input['email'],$input['password']);
			 if ((!$user->hasAccess('user'))) {
            	 throw new Cartalyst\Sentry\Users\UserNotFoundException();
        }

        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            $message = 'Email field is required.';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            $message = 'Password field is required.';
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            $message = 'Invalid email and/or password.';
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $message = 'Invalid email and/or password.';
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $message = 'Account has been deactivated.';
        }catch(Cartalyst\Sentry\Throttling\UserSuspendedException $e){
			 $message = 'Invalid email and/or password.';
		}
		

        if (!empty($message)) {

            echo json_encode(array('message'=>$message));
        }
		else if($user->hasAccess('user')){ 
			 Session::flash('action','dashboard');
       	 	 echo json_encode(array('message'=>'success'));
		}
		else
			echo json_encode(array('message'=>'Login failed'));
    	
	}
	/*
	*/
	function generatePassword()
	{
		$email=Input::get('email');
		$rules = array(
						'email' => 'required|email|exists:users',
						);
		$messages = array(
   				 			'email.exists' => 'The email address entered do not exist.',
						);				
		$validator = Validator::make(Input::all(),$rules,$messages);	
		if ($validator->fails())
		{
			echo json_encode(array('message'=>'The email address entered do not exist.'));
		}
		else
		{
			$new_password =trim(substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz123456789ARUNDEVP",5)),0,8));
			$data['email']=Input::get('email');  
			$user = Sentry::findUserByLogin($data['email']);
			$resetCode = $user->getResetPasswordCode();
			if ($user->checkResetPasswordCode($resetCode))
			{
				// Attempt to reset the user password
				if ($user->attemptResetPassword($resetCode,$new_password))
				{
					$data['new_password']=$new_password;
					$data['user']=$user; 
					Mail::send('emails.forgot_mail',$data,
							function($message) use($data) 
									  {
										 $message->to($data['email'],'')
										->from(Config::get('mail.from.address'),Config::get('mail.from.name'))
										->subject('New password generated');
									  }
							);
					echo json_encode(array('message'=>'An email is send to your account.'));		
				}
				else
				{
					echo json_encode(array('message'=>'Try again later!'));
				}
			}
		}
		
	}
	/**
		 * Logs out the current user.
     */
		function logout()
		{
			User::logout();
			return Redirect::to('/');
		}

}?>