<?php
$mainCategories=Category::getMainCategories();
?>
<div class="sidePanel">
      <div class="wrapper">
      	<ul class="AccordionMenu">
          <?php foreach($mainCategories as $category){?>
          		<li><a href="javascript:;" id="<?php echo $category->id?>" data-title="main"><?php echo $category->name?></a></li>
                <?php
                $subCategories=Category::getSubCategoriesByParent($category->id);
				if(count($subCategories)>0){
				?>
                	<div class="subNav">
            			<div class="AM-content">
              				<ul>
                            <?php foreach($subCategories as $catgory){?>
                            	<li><a href="javascript:;" id="<?php echo $catgory->id?>" data-title="sub"><?php echo $catgory->name?></a></li>
                            <?php
							}?>
                            </ul>
                    </div>
                  </div>
          <?php
				}
		  }?>
          </ul>
          <!--fdbckwrapper-->
        </div><!--wrapper-->
</div><!--side panel-->
