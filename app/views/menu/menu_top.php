<?php
 $path=Request::path(); 
?>
<style>
.hide_me{display:none;}
</style>
<script src="<?php echo Request::root()?>/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<link href="<?php echo Request::root()?>/fancybox/jquery.fancybox.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(".fancybox").fancybox();
	});
</script>
</head>
<body>

<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bscollapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		  <a class="navbar-brand" href="<?php echo Request::root()?>">CART</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav ">
        <form class="navbar-form navbar-left" role="search" id="search_form">
              
          
          <input type="hidden" name="category" id="category" value="0">
          <input type="hidden" name="type" id="type" value="main">
          <input type="hidden" name="page" id="page" value="">
          <!--<div class="divi-3 ico-Category">
          <select class="form-control search" placeholder="Category" role="submit" name="category" id="category_search">
            <option></option>
             <?php
				//foreach($categories as $category){
			?>
            <option value="<?php //echo $category->id?>"><?php //echo $category->name?></option>
            <?php
				//}?>
          </select>
          </div>-->
          <div class="divi-2 ico-Search">
          <input class="form-control search" placeholder="Search" type="text" role="submit" name="searchKey" id="searchKey">
          </div>
        </form>
      </ul>
    <div class="collapse navbar-collapse" id="bscollapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        
		  <?php
				  $mainCategories=Category::getMainCategories();
				foreach($mainCategories as $category){
			?>
			 <li class="dropdown">
          		<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  id="<?php echo $category->id?>" data-title="main"><?php echo $category->name?></a>
              <ul class="dropdown-menu" role="menu">
			 		<?php $sub_cats =  Category::getSubCategoriesByParent($category->id);
					foreach($sub_cats as $category){?>
                <li><a href="javascript:;" id="<?php echo $category->id?>" data-title="sub"><?php echo $category->name?></a></li>
				<?php }?>
              </ul>
        </li>
            <?php
				}?>
        <li>
          <!--<a href="javascript:;" data-toggle="modal" data-target="#myModal">FeedBack</a>-->
          <?php if(!Sentry::check()){?>
          <a class="PostAd_anchr fancybox" href="#sign_in_r">Sign In</a>
         
           <div id="sign_in_r" class="myads_block">
             <div class="insidedata">
               
                            <div class="popupcommoncls_formdiv applcnt_reg">
                             <div class="insd_frm">
                             <p style="font-size: 16px;">Login</p>
                               <form id="loginForm">
                               <input type="text" name="email" class="name" placeholder="Username" required>
                               <input type="password" name="password" class="password" placeholder="Password" required>
                               <input type="submit" class="Submit" name="Submit" value="Sign In" id="login_submit">
                               </form>
                              
                            </div><!--insd_frm-->
                             
                           </div> <!--applcnt_reg-->
                       </div>
          </div><!--myads_block-->
        </li>
         <?php
		  }
		  else{?>
          <li><a class="" href="<?php echo Request::root()?>/users/logout">Logout</a></li>
          <?php
		  }?>
        <!--<form class="navbar-form navbar-left" role="search">
          <input type="text" class="form-control" placeholder="Search">
          <button type="submit" class="btn btn-default">Submit</button>
        </form>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Feedback Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <?php echo Form::open(array('id'=>'feedbackForm','url'=>'#'));?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">FeedBack</h4>
        </div>
        <div class="modal-body">
          
          <div class="form Layout">
            <div class="row">
              <div class="lbl">
                <label for="txtName" class="mandatory">Name</label>
              </div>
              <div class="clm-6">
                <input type="text" id="txtName" name="name" required>
              </div>
            </div>
            <div class="row">
              <div class="lbl">
                <label for="txtMail" class="mandatory">Email</label>
              </div>
              <div class="clm-6">
                <input type="email" id="txtMail" name="email" required>
              </div>
            </div>
            <div class="row">
              <br><br>
            </div>
            <div class="row">
              <div class="lbl">
                <label for="txtTitle" class="mandatory">Subject</label>
              </div>
              <div class="clm-6">
                <input type="text" id="txtTitle" name="subject" required>
              </div>
            </div>
            <div class="row">
              <div class="lbl">
                <label for="txtDesc" class="mandatory">Feedback</label>
              </div>
              <div class="clm-6">
                <textarea id="txtDesc" name="feedback" required></textarea>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn" id="feed_submit">Submit</button>
        </div>
      </div><!-- /.modal-content -->
      <?php echo Form::close()?>
    </div><!-- /.modal-dialog -->
  </div>
  
<?php
$paramPage=Input::get('page'); 
$hiden_class='';$bg_hide='hide_me';
if($path=='/'){
	$hiden_class='hide_me';
	$bg_hide='';
}
else
	$hiden_class='';
/*if(!empty($paramPage)){ 
$bg_hide='';
$hiden_class='';
}*/
?>  
<script>
jQuery(document).ready(function(e) {

    jQuery(".SmartSearchNavig").addClass("active");
	jQuery(".container.main").addClass("display_me");
	jQuery(".bg").removeClass("homebg");
	jQuery(".bg").css({'background': '#ececec'});
	jQuery(".sidePanel .wrapper").addClass("auto_width");
	jQuery(".nav.navbar-nav.SmartSearch").removeClass("inactive");
});
</script>
<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.footerdiv{display:none;}
</style>

<div class="container main <?php echo $hiden_class?>">
<?php /*?><?php
if(!empty(Session::get('message'))){?>
<div class="message fadeOut"><?php echo Session::get('message');?></div>
<?php
}?><?php */?>
<div class="row">

