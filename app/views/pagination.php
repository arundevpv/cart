<?php
// Created By Arun @ Itmarkerz (19/2/15)
if ($paginator->getLastPage() > 1)	// check pagination links needed
{
	$start=$paginator->getCurrentPage(); 
	$last_page=$paginator->getLastPage(); 
	$page_limit=Config::get('upforrent_config.pageLimit');
	//conditions checking
	if(($page_limit>=$start)&&($start>1)){ 
		$limit=$start+1;
		$start=$start-1;
	}
	else{
		$limit=$start+2;
		$start=$start-1;
	}
	if(($limit>=$last_page)||($start>=$last_page)){
		$limit=$last_page;
		$start=($limit-$page_limit)+1; 
	}
	if($start<=0)
		$start=1;
		?>
    <nav class="UFRPaginate">    
	<ul class="pagination pull-right">
    	<li class="<?php echo($paginator->getCurrentPage() == 1) ? ' disabled' : '' ?>">
            <a href="<?php echo $paginator->getUrl($paginator->getCurrentPage()-1) ?>" data-id="<?php echo $paginator->getCurrentPage()-1?>"><span>«</span></a></li>
        <?php 
			for ($i = $start; $i <= $limit; $i++){?>
            	 <li class="<?php echo ($paginator->getCurrentPage() == $i) ? ' active' : '';?>">
     			 <a href="<?php echo $paginator->getUrl($i) ?>" data-id="<?php echo $i?>"><?php echo $i?></a>
                 </li>
      <?php
      }
	 if(Config::get('upforrent_config.nextLinks')){
       if(($paginator->getLastPage())!=($paginator->getCurrentPage())) {?>
       	 <li class="<?php echo ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '';?>">
         <a href="<?php echo $paginator->getUrl($paginator->getCurrentPage()+1) ?>" data-id="<?php echo $paginator->getCurrentPage()+1?>"><span>>></span></a>
    	</li>
    <?php
	}else{?>
    <li class="<?php echo ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : ''?>">
		    <a><span>>></span></a>
      </li>
		<?php }
		}?>
  </ul>
  </nav>
<?php       
}
?>
