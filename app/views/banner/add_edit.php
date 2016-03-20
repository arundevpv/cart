<?php echo View::make('admin.menu.menu_meta');?>
<script src="<?php echo Request::root()?>/js/dropzone.js"></script>
<?php echo View::make('admin.menu.menu_top');?>
<?php echo Form::open(array('url'=>'admin/banners/save','files'=>true,'id'=>'catForm'))?>
<div class="page">
    <div class="form">
      
      <h3>Banners</h3>
      
      <div class="row">
        <div class="lbl">
          <label for="txtCName" class="mandatory">Banner Name</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtCName" name="banner" required value="<?php echo isset($banner->title)?$banner->title:''?>">
        </div>
      </div>
	  <div class="row">
        <div class="lbl">
          <label for="txtCName" class="mandatory">Link</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtCName" name="link" required value="<?php echo isset($banner->link)?$banner->link:''?>">
        </div>
      </div>
      <div class="row">
        <div class="lbl">
          <label for="photo">Upload Photo</label>
        </div>
        <div class="Ctrl">
         
           <div id="photo" class="dz-clickable dropzone" style="min-height:300px;">
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
       
      <div class="row"><br></div>
      <div class="row">
        <div class="lbl">
        </div>
        <div class="Ctrl">
          <button type="submit" class="btn">Save</button>
          &nbsp;&nbsp;&nbsp;
          <button type="reset" class="btn">Cancel</button>
        </div>
      </div>
      <div class="row"><br><br><br></div>
      
      
    </div><!--form-->
</div>
<input type="hidden" name="files" id="files" value="" />
<input type="hidden" name="removed_files" id="removed_files" value="" />
<?php echo Form::close()?>
<?php echo View::make('menu.script_loader');?>
<script type="text/javascript">
$(document).ready(function(e) {
	$('#catForm').validate();
});
var myDropzone = new Dropzone("div#photo",{
		url: "<?php echo Request::root()?>/admin/banners/upload-image",
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
<?php echo View::make('admin.menu.menu_footer');?>