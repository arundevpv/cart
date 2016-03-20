<?php
$logo="";

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
		<body>
   			<center><div align="center" style="border:1px solid #CCCCCC;width:600px;height:auto">
            <div align="left">
             <!--<img src="<?php //echo $logo;?>">-->
            </div>
            <br/>
       		 <p align="left">Hi {{$user->first_name}},</p><br>
          <p align="left">Following is the new password for your Upforrent Account :- </p>
        <br/>
        <b>{{$new_password}}</b>
        <br/>
        <br/> <br/>
            <div style="margin-left:400px;">
            Thank You<br/>
			Upforrent Team<br/>
            http://upforrent.in/<br/>
           
            </div>
			<div></center>
		</body>
</html>