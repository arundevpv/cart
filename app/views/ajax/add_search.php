 <?php echo $adds->links();?>
<ul class="ProList fullWidth no-mgn">
<?php
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
             <p>Quantity <?php echo $add->quantity?></p>
          <p>Brand <span class="brans" style="color:#03C"><?php echo $add->manufacturer->name?></span></p>
          <p>Model <?php echo $add->model?></p>
            	<input type="button" value="Buy It Now" class="btn" style="float:left" />
            	<input type="button" value="Add to cart " class="btn" style="margin-top:10px" />
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
 <?php echo $adds->links();?>