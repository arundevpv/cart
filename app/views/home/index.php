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
</div><!--#search_res--> 
</div><!--conpanel-->
</div><!--row-->
</div><!--container-->
 <?php echo View::make('menu.script_loader');?>

<?php echo View::make('menu.menu_footer');?>
