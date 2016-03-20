<div class="tab-pane">
<h3><?php echo $category->name?> 
          <ul class="categoryGrid g3" id="sub">
           <?php foreach($subCategories as $category){?>
            <li>
              <h4><a href="javascript:;" id="<?php echo $category->id?>"><img src="<?php echo Request::root()?>/uploads/category/<?php echo $category->photo?>"><?php echo $category->name?></a></h4>
            </li>
            <?php
		   }?>
		</ul>
</div>