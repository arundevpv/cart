<?php
 $path=Request::path(); 
?>
<style>
.hide_me{display:none;}
</style>
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
      <a class="navbar-brand" href="<?php echo Request::root()?>/admin/adds">CART</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav SmartSearch">
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
          
        </form>
      </ul>
    <div class="collapse navbar-collapse" id="bscollapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Master</a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo Request::root()?>/admin/category/add">Category</a></li>
				 <li><a href="<?php echo Request::root()?>/admin/adds">Products</a></li>
				 <li><a href="<?php echo Request::root()?>/admin/banners">Banners</a></li>
				  <li><a href="<?php echo Request::root()?>/admin/manufacture">Manufacturer</a></li>
              </ul>
        </li>
        <li class="dropdown"><a href="<?php echo Request::root()?>/admin/logout">Logout</a></li>
       <!-- <li>
          <a href="javascript:;" data-toggle="modal" data-target="#myModal">FeedBack</a>
        </li>-->
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
                <input type="text" id="txtName">
              </div>
            </div>
            <div class="row">
              <div class="lbl">
                <label for="txtMail" class="mandatory">Email</label>
              </div>
              <div class="clm-6">
                <input type="email" id="txtMail">
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
                <input type="text" id="txtTitle">
              </div>
            </div>
            <div class="row">
              <div class="lbl">
                <label for="txtDesc" class="mandatory">Feedback</label>
              </div>
              <div class="clm-6">
                <textarea id="txtDesc"></textarea>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="button" class="btn">Submit</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  
<?php
$paramPage=Input::get('page'); 
$hiden_class='';$bg_hide='hide_me';
if($path=='/'){
	$hiden_class='hide_me';
}
if(!empty($paramPage)){
$bg_hide='hide_me';
$hiden_class='';
}
?>  
<div class="bg <?php echo $bg_hide?>">
	<img src="img/bg1.jpg">
  <div class="SmartSearchNavig">
    <form class="glyphicon glyphicon-search" role="search">
      <input type="text" class="form-control" placeholder="Search">
    </form>
  </div>
</div>
<div class="container main <?php echo $hiden_class?>">
<?php
//if(!empty(Session::get('message'))){?>
<!--<div class="message fadeOut"><?php //echo Session::get('message');?></div>
--><?php
//}?>
<div class="row">

