<?php echo View::make('admin.menu.menu_meta');?>
<?php echo View::make('admin.menu.menu_top');?>
<?php echo Form::open(array('url'=>'admin/manufacture/save','files'=>true,'id'=>'catForm'))?>
<?php
$parentCategory=array();$parent=array();
 foreach($manufactures as $catgory){
	if($catgory->parent_id==0){
		$parentCategory[$catgory->id]=$catgory->name;
		$parent[]=array('id'=>$catgory->id,'name'=>$catgory->name);
	}
}
?>
<input type="hidden" name="id" value="<?php echo isset($category->id)?$category->id:''?>" />
<div class="page">
    <div class="form">
      
      <h3>Add New Manufacture</h3>
      
      <div class="row">
        <div class="lbl">
          <label for="txtCName" class="mandatory">Manufacture Name</label>
        </div>
        <div class="Ctrl">
          <input type="text" id="txtCName" name="category" required value="<?php echo isset($category->name)?$category->name:''?>">
        </div>
      </div>
      
       <div class="row">
             <div class="lbl">
              <label for="txtCName" class="mandatory">Image(130x 100)</label>
            </div>
            <div class="Ctrl">
            <?php
				$required='required="required"';
				if(isset($category->id))
					$required='';
			?>
             <input type="file" name="photo" <?php echo $required;?> />
             <?php
			 $photo=isset($category->photo)?$category->photo:'';
			 if(!empty($photo))
			 	echo '<img src="'.Request::root().'/uploads/category/'.$photo .'"/>';
			 ?>
             <input type="hidden" name="old_file" value="<?php echo $photo;?>" />
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
      
      <table class="table-responsive UFPTable">
      	<tr>
          <th>Manufacture</th>
          <th class="sml">&nbsp;</th>
        </tr>	
        <?php
		foreach($manufactures as $category){?>
        <tr>
          <td><?php echo $category->name?></td>
          <td>
          	<a class="IcoBtn" href="#<?php echo Request::root()?>/admin/manufacture/remove/<?php echo $category->id?>"><span class="glyphicon glyphicon-remove"></span><span class="sr-only">Remove</span></a>
            <a class="IcoBtn" href="#<?php echo Request::root()?>/admin/manufacture/edit/<?php echo $category->id?>"><span class="glyphicon glyphicon-pencil"></span><span class="sr-only">Edit</span></a>
          </td>
        </tr>
       	<?php
		}?>
      </table>
    </div><!--form-->
</div>

</div>
<?php echo Form::close()?>
<?php echo View::make('menu.script_loader');?>
<script type="text/javascript">
$(document).ready(function(e) {
	$('#catForm').validate();
});
</script>
<?php echo View::make('admin.menu.menu_footer');?>