<script type="text/javascript">
$(document).ready(function(e) {
	var cUrl=window.location.href;
	var location=cUrl.split('/');
    var xhr11=null;
	$('#category_search').change(function(){
		searchAdd();
	});
	$('#searchKey').keyup(function(){
		if($(this).val().length>=3){searchAdd();}
	});
	$('#location_search').focusout(function(){
		if($(this).val()!="")
			searchAdd();
	});
	$('.AccordionMenu li > a').click(function(){
		$('#category').val($(this).attr('id'));
		$('#type').val('main');
		$('#page').val('');
		searchAdd();
	});
	$('.AccordionMenu .subNav').find('li > a').click(function(){
		$('#category').val($(this).attr('id'));
		$('#type').val('sub');
		$('#page').val('');
		searchAdd();
	});
	$('.pagination').find('a').live('click',function(evt){
		if(location[location.length-1]=='adds' && location[location.length-2]!='admin'){
			evt.preventDefault();
			$('.pagination li').each(function(index, element) {
				$(this).removeClass('active');
			});
			$(this).parent().addClass('active');
			$('#page').val($(this).attr('data-id'));
			searchAdd();
		}
	});
	function searchAdd()
	{
		var data=$('#search_form').serialize();
		if(xhr11!=null)
			xhr11.abort();
		xhr11=$.ajax({type:'post',url:'<?php echo Request::root()?>/admin/search',data:data,success: function(output){
			$('#search_res').html(output);xhr11=null;
			showMap();
			}
			});	
		
	}
});
</script>
</body>
</html>