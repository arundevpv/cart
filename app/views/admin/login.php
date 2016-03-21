<?php echo View::make('menu.menu_meta');?>
<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bscollapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>-->
      <a class="navbar-brand" href="<?php echo Request::root()?>">CART</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
    <div class="collapse navbar-collapse" id="bscollapse-1">
      <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="signup.html" class="btn">SignUp</a></li>
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="bg"></div>

<div class="container main">
	<div class="popCenter transparent">
    	<div class="avatar"><img src="img/profile.jpg"></div>
        <form role="form" action="<?php echo Request::root()?>/admin/authenticate" class="form-lg login" method="post">
        	<p class="error"><?php echo Session::get('message') ?></p>
            <input placeholder="Username" autofocus type="text" name="email" value="<?php echo Input::old('username')?>">
            <p class="error"><?php echo $errors->first('username', ':message') ?></p>
            <div class="combiPwdBtn clearfix">
            	<input placeholder="Password" type="password" name="password">
                <button type="submit"></button>
            </div>
            <p class="error"><?php echo $errors->first('password', ':message') ?></p>
			<div class="clearfix">

                <!--<a class="pull-right" href="forgot.html">Forgot password?</a>-->
                <!--<div class="pull-left"><input value="remember-me" type="checkbox"><label class="checkbox">Remember me</label></div>-->
            </div>
        </form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(e) {
   
});
</script>
<?php echo View::make('menu.menu_footer');?>
