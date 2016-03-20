<?php echo View::make('menu.menu_meta');?>
<script src="<?php echo Request::root()?>/js/dropzone.js"></script>
<?php echo View::make('menu.menu_top');?>
<?php echo Form::open(array('url'=>'adds/post','files'=>true,'id'=>'add'))?>
<div class="page">
    <div class="form">
      
      <h3>Enter Product Details</h3>
      
      <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="mandatory">Title</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtTitle" name="title" required value="<?php echo Input::old('title')?>">
          <p class="error"><?php echo $errors->first('title', ':message') ?></p>
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="mandatory">Price</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtTitle" name="price" required value="<?php echo Input::old('price')?>">
          <p class="error"><?php echo $errors->first('price', ':message') ?></p>
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="mandatory">Quantity</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtTitle" name="qty" required value="<?php echo Input::old('qty')?>">
          <p class="error"><?php echo $errors->first('qty', ':message') ?></p>
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="">Model</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtTitle" name="model" required value="<?php echo Input::old('model')?>">
          <p class="error"><?php echo $errors->first('model', ':message') ?></p>
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="txtTitle" class="">Freeshipping</label>
        </div>
        <div class="Ctrl">
         <input type="radio" value="1" name="frr_ship"  checked="checked"/>Yes
		 <input type="radio" value="0" name="frr_ship" />No
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
            <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
            <?php
				}?>
          </select>
          </div>
          <p class="error"><?php echo $errors->first('category', ':message') ?></p>
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="category1" class="">Manufacturer</label>
        </div>
        <div class="Ctrl">
        <div class="combo">
          <select class="mandatory" placeholder="Manufacturer" name="manufacturer" id="manufacturer1">
            <option></option>
             <?php
				$manufactures = Manufacturer::all();
				foreach($manufactures as $category){
			?>
            <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
            <?php
				}?>
          </select>
          </div>
          <p class="error"><?php echo $errors->first('manufacturer', ':message') ?></p>
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="txtDesc" class="mandatory">Description</label>
        </div>
        <div class="Ctrl">
          <textarea id="txtDesc" name="description" required rows="8"><?php echo Input::old('description')?></textarea>
           <p class="error"><?php echo $errors->first('description', ':message') ?></p>
        </div>
      </div>
      
      
      
      
      <div class="row">
        <div class="lbl">
          <label for="photo">Upload Photo</label>
        </div>
        <div class="Ctrl">
         
           <div id="photo" class="dz-clickable dropzone">
                <div class="dz-message">
                    Drop files here or click to upload.
                </div>
		  </div>
          <!--<div class="fileUpload">
			<span></span>
			<input type="file" name="photoField" id="photoField" >
          </div>-->
        </div>
      </div>
      
      
      
      
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
	
      
  <!--append-->  
      <div class="row"><br></div>
      <div class="row">
        <div class="lbl">
        </div>
        <div class="Ctrl">
          <button type="submit" class="btn">Post</button>
          &nbsp;&nbsp;&nbsp;
          <button type="reset" class="btn">Cancel</button>
        </div>
      </div>
      
    </div>
</div>
<input type="hidden" name="files" id="files" value="" />
<input type="hidden" name="removed_files" id="removed_files" value="" />
<input type="hidden" name="mapLat" value="" id="mapLat" />
<input type="hidden" name="mapLong" value="" id="mapLong" />	
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
