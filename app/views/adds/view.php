<?php echo View::make('admin.menu.menu_meta');?>
<?php echo View::make('admin.menu.menu_top');?>
<a href="<?php echo Request::root()?>/adds"><input type="button" class="btn" value="Add" /></a>
<div class="" id="search_res">
  <ul class="ProList">
	<?php
	$counter=1;$k=0;
    foreach($adds as $add){
		$images=$add->image;
		$class='';
		if($add->is_active==0)
		  $class="Hidden";
		?>
     <li>
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
           
        </div>
        <div class="basic">
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
    <?php echo $adds->links();?>
   </div><!--#search_res-->
</div>
<div id="map_c">
 <div class="Ctrls" align="right" style="height:0px;">
 	<a href="javascript:;"><span class="glyphicon glyphicon-remove" style="top:-18px; right:-12px; display:none; font-size:20px;color:#e00;"></span></a>
 </div>
	<div id="map"></div>
</div>
<?php echo View::make('admin.menu.script_loader');?>
<script type="text/javascript">
$(document).ready(function(e) {
var xhr2=null;
///* Cards Menu Begins */
	
	(function($) {
		var Cards = $('ul.ProList > li').removeClass('active');	
		$('ul.ProList > li').click(function(fe) {
			Cards.removeClass('active');
			$(this).toggleClass('active');
			return true;
		});
	})(jQuery);
	var xhr=null;
	$('#_search').keyup(function(ev){
		if($(this).val().length<3)return;
		if(xhr!=null)
			xhr.abort;
		xhr=$.ajax({url:'<?php echo Request::root()?>/admin/search/'+$(this).val(),success: function(search_result){
					$('#search_res').html(search_result);
					xhr=null;
				}
			});
	});
	$(document).on('click','input:checkbox',function(){
		var status=1;
		var id=$(this).attr('id');
		if($(this).is(':checked'))
		  status=0;
		 else
		 	status=1; 
			xhr2=$.ajax({url:'<?php echo Request::root()?>/admin/change-status/'+status+'/'+id,success: function(){
					
				}
			});
	});
});
</script>

<?php echo View::make('admin.menu.menu_footer');?>
