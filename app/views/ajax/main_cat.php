<h2>Choose a Category</h2>
          <ul class="categoryGrid g3" id="main">
           <?php foreach($mainCategories as $category){?>
            <li>
              <h4><a href="javascript:;" id="<?php echo $category->id?>"><img src="<?php echo Request::root()?>/uploads/category/<?php echo $category->photo?>"><?php echo $category->name?></a></h4>
            </li>
            <?php
		   }?>
		</ul>
