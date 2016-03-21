<?php echo View::make('menu.menu_meta');?>
<?php echo View::make('menu.menu_top');?>
<?php echo View::make('menu.side_bar');?>
<?php
$mainCategories=Category::getMainCategories();
?>
<div class="conPanel">
<!--category-->
<div class="wrapper" id="cat">

       </div>
<!--products-->
<br />
<div id="search_res">
		<div id="carousel-proImg" class="carousel slide" data-ride="carousel" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
						$banner= Banner::find(1);$tmp=0;
						$images=DB::table('banner_image')->get();
						foreach($images as $image){
					?>
				<li data-target="#carousel-proImg" data-slide-to="0" class="<?php echo ($tmp==0)?'active':'' ?>"></li>
				<?php
				$tmp++;
				}?>
				

          </ol>

        <!-- Wrapper for slides -->

          <div class="carousel-inner" role="listbox">
	
				<?php
						$tmp=0;
						foreach($images as $image){
					?>
				<div class="item  CarouselImg <?php echo ($tmp==0)?'active':'' ?>">
					
				  		<img src="<?php echo Request::root()?>/uploads/banners/<?php echo $image->image?> ">
				  
				
	
				  <!--<div class="carousel-caption"> Why Buy When You Can Rent</div>-->
	
				</div>
	
	  <?php
	  $tmp++;
				  }?>
				 
				

          </div><!--carousel-inner .-->

        

         

        </div><!--carousel-proImg#-->
        <?php
			use App\Models\Category\Category;

        	$categories=Category::where('shown_home_page',1)->get();
			foreach($categories as $category){?>
			<h4><?php echo $category->name?></h4>  
            <ul class="ProList">
	<?php
	$adds=$category->adds()->limit(5)->get();
	$counter=1;$k=0;
    foreach($adds as $add){
		$images=$add->image;
		$class='';
		if($add->is_active==0)
		  $class="Hidden";
		?>
     <li>
      <div class="Card" data-id="<?php echo $add->id?>">
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
           
        </div>
        <div class="basic">
        		<input type="button" value="Buy It Now" class="btn" style="float:left" onclick="alert('Register/Login')" />
            	<input type="button" value="Add to cart " class="btn" style="margin-top:10px" onclick="alert('Register/Login')" style="margin-left:20px; margin-top:0px;"/>
            <p>
           <?php echo $add->description?>
            </p>  
              
              
             </div>
        
        <div class="adv">
        	<h4><?php echo $add->price?></h4>
          <p>Quantity <?php echo $add->quantity?></p>
          <p>Brand <span class="brans" style="color:#03C"><?php echo $add->manufacturer->name?></span></p>
          <p>Model <?php echo $add->model?></p>
          
        </div>
      </div>
    </div>
    </li>
       <?php
	   $sub_class_p='';
	   $counter++;
	   $k++;
    }?>
   </ul>      
        <?php
			}?>
</div><!--#search_res--> 
</div><!--conpanel-->
</div><!--row-->
</div><!--container-->
 <?php echo View::make('menu.script_loader');?>

<?php echo View::make('menu.menu_footer');?>
