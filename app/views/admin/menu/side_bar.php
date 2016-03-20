<?php
// Created By Arun @ Itmarkerz (18/2/15)
$mainCategories=Category::getMainCategories();
?>
<div class="sidePanel">
      <div class="wrapper">
      	<ul class="AccordionMenu">
          <li class="active"><a href="javascript:;" id="0">All Ads</a></li>
          <?php foreach($mainCategories as $category){?>
          		<li><a href="javascript:;" id="<?php echo $category->id?>"><?php echo $category->name?></a></li>
                <?php
                $subCategories=Category::getSubCategoriesByParent($category->id);
				if(count($subCategories)>0){
				?>
                	<div class="subNav">
            			<div class="AM-content">
              				<ul>
                            <?php foreach($subCategories as $catgory){?>
                            	<li><a href="javascript:;" id="<?php echo $catgory->id?>"><?php echo $catgory->name?></a></li>
                            <?php
							}?>
                            </ul>
                    </div>
                  </div>
          <?php
				}
		  }?>
          </ul>
        </div><!--wrapper-->
</div><!--side panel-->