<?php echo View::make('menu.menu_meta');?>
<script src="<?php echo Request::root()?>/js/dropzone.js"></script>
<?php echo View::make('menu.menu_top');?>
<?php echo Form::open(array('url'=>'users/adds/update','files'=>true,'id'=>'add'))?>
<input type="hidden" name="id" value="<?php echo $add->id?>">
<div class="page">
    <div class="form">
      
      <h3>Enter Product Details</h3>
      
      <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="mandatory">Title</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtTitle" name="title" required value="<?php echo $add->title?>">
          <p class="error"><?php echo $errors->first('title', ':message') ?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="category1" class="mandatory">Category</label>
        </div>
        <div class="Ctrl">
        <div class="combo">
          <select class="" placeholder="Category" name="category" id="category1">
            <option></option>
             <?php
				foreach($categories as $category){
			?>
            <option value="<?php echo $category->id?>" <?php echo ($category->id==$add->category_id)?'selected':''?>><?php echo $category->name?></option>
            <?php
				}?>
          </select>
          </div>
          <p class="error"><?php echo $errors->first('category', ':message') ?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="txtDesc" class="mandatory">Description</label>
        </div>
        <div class="Ctrl">
          <textarea id="txtDesc" name="description" required rows="8"><?php echo $add->description?></textarea>
           <p class="error"><?php echo $errors->first('description', ':message') ?></p>
        </div>
      </div>
      <div class="row" id="rent_period">
        <div class="lbl">
          <label for="cmbPeriod" class="mandatory">Rental Period</label>
        </div>
        <div class="Ctrl">
        	<div class="combo">
          <select type="text" id="cmbPeriod" name="rent_period" required>
          	<?php 
			$old=$add->rental_period;
			for($i=1;$i<=count($periods);$i++){
				?>
                <option value="<?php echo $i?>" <?php echo ($old==$i)?'selected':''?>><?php echo $periods[$i-1]?></option>
				<?php
			}?>
          </select>
          </div>
           <p class="error"><?php echo $errors->first('rent_period', ':message')?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="txtAmt" class="mandatory" id="rent_amnt">Rental Amount</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtAmt" name="rent_amount" required value="<?php echo $add->rental_amount?>">
           <p class="error"><?php echo $errors->first('rent_amount', ':message')?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="optRoB" class="">Available for Sale</label>
        </div>
        <div class="Ctrl" id="av_opt">
         <input type="hidden" name="available_for" value="1" />
          <input type="checkbox" class="custom" name="available_for" id="optBuy" value="2" <?php echo ($add->available_for==2)?'checked':''?>><label for="optBuy"></label>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="txtSecDepo" class="">Security Deposit</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtSecDepo" name="security_deposit" value="<?php echo $add->security_deposit?>">
        </div>
      </div>

      <div class="row">
        <div class="lbl">
          <label for="photo">Upload Photo</label>
        </div>
        <div class="Ctrl">
         
           <div id="photo" class="dz-clickable dropzone">
                <div class="dz-message">
                   <!-- Drop files here or click to upload.-->
                </div>
                <!--old-->
                <?php foreach($add->image as $image){?>
                <div class="dz-preview dz-processing dz-image-preview"> 
                    <a class="close" data-title="already">×</a> 
                    <input type="hidden" name="file" value="<?php echo $image->image_name?>">
                    <input type="hidden" name="file_id" value="<?php echo $image->id?>">
                    <div class="dz-details"> 
                    <input type="hidden" class="file_name" value="">   
                    <div class="dz-filename"><span data-dz-name=""></span></div>   
                     <div data-dz-size="" class="dz-size"><strong></strong></div>   
                     	 <img data-dz-thumbnail="" alt="Loading..." src="<?php echo Request::root()?>/uploads/adds/<?php echo $image->image_name?>" width="100px" height="100px" />  
                      </div>  
                      <div class="dz-progress">
                      	<span data-dz-uploadprogress="" class="dz-upload" style="width: 100%;"></span>
                      </div>  
                      <div class="dz-success-mark"><span>✔</span></div> 
                       	<div class="dz-error-mark"><span>✘</span></div>  
                       <div class="dz-error-message">
                       <span data-dz-errormessage=""></span>
                      </div>
                  </div>
                 <?php }?>
                  
                <!---->
		  </div>
          <!--<div class="fileUpload">
			<span></span>
			<input type="file" name="photoField" id="photoField" >
          </div>-->
        </div>
      </div>
      <h4>Contact Details</h4>
      <div class="row">
        <div class="lbl">
          <label for="txtAdName" class="mandatory">Name</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtAdName" name="name" required="required" value="<?php echo $add->name?>">
          <p class="error"><?php echo $errors->first('name', ':message')?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="optUT" class="mandatory">User Type</label>
        </div>
        <div class="Ctrl">
          <input type="radio" class="custom" name="user_type" id="optUTind" value="1" <?php echo ($add->user_type==1)?'checked':''?>><label for="optUTind">Individual</label>
          <input type="radio" class="custom" name="user_type" id="optUTbus" value="2" <?php echo ($add->user_type==2)?'checked':''?>><label for="optUTbus">Business</label>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="email" class="mandatory">Email</label>
        </div>
        <div class="Ctrl">
          <input type="email" id="email" name="email" value="<?php echo $add->email?>" required="required">
           <p class="error"><?php echo $errors->first('email', ':message') ?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="phone" class="mandatory">Phone Number</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="phone" name="phone_number" required value="<?php echo $add->contact_no?>">
           <p class="error"><?php echo $errors->first('phone_number', ':message') ?></p>
        </div>
      </div>
      <h4>Location Details</h4>
      <!--<div class="row">
        <div class="lbl">
          <label for="state" class="mandatory">State</label>
        </div>
        <div class="Ctrl">
          <div class="combo">
          <select id="state">
            <option value=""></option>
            <?php //foreach($states as $state){?>
            	<option value="<?php //echo $state->id?>"><?php //echo $state->state_name?></option>
            <?php
			//}?>
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="state" class="mandatory">City</label>
        </div>
        <div class="Ctrl">
          <div class="combo">
          <select id="city">
           <option value=""></option>
          </select>
          </div>
        </div>
      </div>-->
    <!--append-->
	<div class="row">
        <div class="lbl">
          <label for="searchTextField">City</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="searchTextField" name="cityName" value="<?php echo $add->city_name?>">
          <input type="hidden" name="city_name" id="city_name" value="" />
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          &nbsp;
        </div>
        <div class="Ctrl">
          <div class="map" id="map_canvas">
          
          </div>
        </div>
      </div>
  <!--append-->  
      <div class="row"><br></div>
      <div class="row">
        <div class="lbl">
        </div>
        <div class="Ctrl">
          <button type="submit" class="btn">Update</button>
          &nbsp;&nbsp;&nbsp;
          <button type="reset" class="btn">Cancel</button>
        </div>
      </div>
      
    </div>
</div>
<input type="hidden" name="files" id="files" value="" />
<input type="hidden" name="removed_files" id="removed_files" value="" />
<input type="hidden" name="old_files" id="old_files" value="">
<input type="hidden" name="removed_old_files" id="removed_old_files" value="">
<input type="hidden" name="mapLat" value="<?php echo $add->latitude?>" id="mapLat" />
<input type="hidden" name="mapLong" value="<?php echo $add->longitude?>" id="mapLong" />	
<?php echo Form::close()?>
</div>
<div id="dialog-confirm" title="Delete Photo?" style="display:none">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Are you sure?</p>
</div>
</div>
<?php echo View::make('menu.script_loader');?>
<script src="<?php echo Request::root()?>/js/jquery.validate.js"></script>
<script src="<?php echo Request::root()?>/js/drawmap.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	var xhr=null;var xhr2=null;
	$('#_search').keyup(function(ev){
		if($(this).val().length<3)return;
		if(xhr!=null)
			xhr.abort;
		xhr=$.ajax({url:'<?php echo Request::root()?>/search/'+$(this).val(),success: function(search_result){
					$('#search_res').html(search_result);
					xhr=null;
				}
			});
	});
	$('#state').change(function(){
		xhr1=$.ajax({url:'<?php echo Request::root()?>/cities',data:{state:$(this).val()},type:"POST",dataType:"json",success: function(result){
					$('#city').empty();
					$('#city').append(new Option('Choose',''));
					$.each(result,function(i,v){
						$('#city').append(new Option((this.city_name).replace('"',''),this.id));
					});
				}
			});
	});
	 //validation
	  $('#add').validate({ // initialize the plugin
        rules: {
                description:{minlength:30},
				category:{required:true}
                     
        }
    });
	
	$('#av_opt>input:radio').click(function(){
		var selected=$(this).val();
		if(selected==1)
		{
			$('#rent_period').show();
			$('#rent_amnt').html('Rental Amount');
		}
		else
		{
			$('#rent_period').hide();
			$('#rent_amnt').html('Sale Amount');
		}
	});
});
	var myDropzone = new Dropzone("div#photo",{
		url: "<?php echo Request::root()?>/adds/upload-image",
		autoProcessQueue: true,
		addRemoveLinks: false,
		maxFilesize: 3.0, // MB
		init: function() {
			myDropzone = this; // closure
		},
		success:function(file,response){
			var old_files= $('#files').val();
			$('#files').val(old_files+response+',');
			$('.dz-preview:last').find('.file_name').val(response);
		}  
});

</script>
<?php echo View::make('menu.menu_footer');?>
