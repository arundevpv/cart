<?php
class AdminController extends BaseController
{ 
	/*
	*/
	function index()
	{
		return View::make('admin.login');
	}
	/*
	*/
	function authenticate()
	{
		//required filed validation
		$rules = array(
						'email' => 'required|email',
						'password' => 'required',
						);
		$validator = Validator::make(Input::all(),$rules);			
		if ($validator->fails())
		{
			$messages = $validator->messages(); 
			return Redirect::to('admin')->withErrors($validator)->withInput();
		}
		else
		{
			$email=Input::get('email');
			$password=Input::get('password');
			$message='';
			try
			{
				$user=User::authenticate($email,$password);
				if (!$user->hasAccess('admin')) {
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
				$message = 'Account has been deactivated.
					Contact an IT for more information.';
			}catch(Cartalyst\Sentry\Throttling\UserSuspendedException $e){
				 $message = 'Invalid email and/or password.';
			}
			if(!empty($message))
				return Redirect::to('admin')->with('message',$message)->withInput();
			else
				return Redirect::to('admin/dashboard');
		}
	}
	/*
	*/
	function adds()
	{
		$data['periods']=Config::get('rental_periods');
		$data['adds']=Adds::getAllProduct();
		return View::make('adds.view',$data);	// onlu admin is used
	}
	/*
	*/
	function search()
	{
		$params=array('category'=>Input::get('category'),
					  'location'=>Input::get('location'),
					  'searchKey'=>Input::get('searchKey')
		);
		$type=Input::get('type');
		if(empty($_POST['page']))
			unset($_POST['page']);
		$sub=array();	
		if($type=='main' && !empty($params['category']))
		{
			$subCategories=Category::getSubCategoriesByParent($params['category']);
			foreach($subCategories as $subc)
			{
				$sub[]=$subc->id;
			}
			if(count($sub)<=0)
				$sub[]='';
			$params['category']=$sub;
		}
		if($params['category']!=0){
			if($type=='sub')
			{
				$category[]=$params['category'];
				$params['category']=$category;
			}
			$data['adds']=Adds::search($params);	
		}
		else{
				$subCategories=Category::getSubCategories();	// list all adds
				foreach($subCategories as $subc)
				{
					$sub[]=$subc->id;
				}
				$params['category']=$sub;
				$data['adds']=Adds::search($params);	
		}		
		$data['periods']=Config::get('rental_periods');
		return View::make('ajax.add_search',$data);
	}
	
	/*
	*/
	function logout()
	{
		User::logout();
		return Redirect::to('admin');
	}
	function dashboard()
	{
		 echo View::make('admin.menu.menu_meta');
		 echo View::make('admin.menu.menu_top');
		 echo View::make('admin.menu.script_loader');
		 echo View::make('admin.menu.menu_footer');

	}
}
?>