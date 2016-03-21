<?php echo View::make('menu.menu_meta');?>
<?php echo View::make('menu.menu_top');?>
<div class="" id="search_res">
  <ul class="ProList">
	<?php
	$counter=1;$k=0;
		$images=$add->image;
		$class='';
		if($add->is_active==0)
		  $class="Hidden";
		?>
     <li class="active">
      <div class="Card">
      <div class="Photo">
        <?php
		if(count($images)>1){?>
      	<div id="carousel-proImg<?php echo $counter?>" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          	<?php
				$sub_class='active';
				for($i=0;$i<count($images);$i++){
			?>
            <li data-target="#carousel-proImg<?php echo $counter?>" data-slide-to="<?php echo $i?>" class="<?php echo $sub_class?>"></li>
            <?php
			$sub_class='';
			}?>
            
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          	<?php
			$sub_class='active';
			foreach($images as $image){?>
            <div class="item <?php echo $sub_class?>">
              <img src="<?php echo Request::root()?>/uploads/adds/<?php echo $image->image_name?>">
            </div>
            <?php
			$sub_class='';
			}?>
            </div>
        
          <!-- Controls -->
          <div class="left carousel-control" href="#carousel-proImg<?php echo $counter?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </div>
          <div class="right carousel-control" href="#carousel-proImg<?php echo $counter?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </div>
        </div>
        <?php
		}
		else{
			foreach($images as $image){
			?>
        <img src="<?php echo Request::root()?>/uploads/adds/<?php echo $image->image_name?>">
        <?php
			}
		}?>
        
      </div>
      <div class="Details">
      	<h2 class="Title"><?php echo $add->title?></h2>
        <div class="Ctrls">
        	<!--<a href="javascript:;"><span class="glyphicon glyphicon-share"></span></a>
            <a href="javascript:;"><span class="glyphicon glyphicon-trash"></span></a>-->
            <?php
			if(Sentry::check()){
				if (Request::is('admin/*')){
				?>
            <span><input class="ShoHid" type="checkbox" id="<?php echo $add->id?>" <?php echo ($add->is_active==0)?'checked':''?>><label for="<?php echo $add->id?>"></label></span>
            <?php
				}
            }?>
        </div>
        <div class="basic">
            <p>
           <?php echo $add->description?>
            </p>  
           
             
        </div>
        
        <div class="adv" style="margin-top:-50px">
        	<h4><?php echo $add->price?></h4>
            <p>Brand <span class="brans" style="color:#03C"><?php echo $add->manufacturer->name?></span></p>
          	<p>Model <?php echo $add->model?></p>
            	<input type="button" value="Buy It Now" class="btn" style="float:left" onclick="alert('Register/Login')"/>
            	<input type="button" value="Add to cart " class="btn" style="margin-top:10px" onclick="alert('Register/Login')" />
        </div>
      </div>
    </div>
    </li>
       <?php
	   $sub_class_p='';
	   $counter++;
	   $k++;
    ?>
   </ul>
   </div>
<h3>RELATED PRODUCTS</h3>
<?php echo View::make('admin.menu.script_loader');?>
<?php echo View::make('menu.menu_footer');?>