<script type="text/javascript">
$(document).ready(function(e) {
	var tmp=0;
    var xhr11=null;var xhr1=null;
	$('#category_search').change(function(){
		searchAdd();
	});
	$('#searchKey').keypress(function(e){
		if(e.which==13 || tmp==1){
			$('#category').val('');
			e.preventDefault();
			tmp=0;
			searchAdd();
		}
	});
	$('#location_search').focusout(function(){
		if($(this).val()!="")
			searchAdd();
	});
	$('#view_all').live('click',function(){ 
		viewAll();
	});
	$('.AccordionMenu li > a').click(function(){ 
		$('#category').val($(this).attr('id'));
		$('#type').val('main');
		$('#page').val('');
		if($(this).attr('data-title')=="main"){
			$.ajax({url:'<?php echo Request::root()?>/get-sub-categories/'+$(this).attr('id'),success:function(result){$('#cat').html(result);}
			});
			searchAdd();
		} 
		if($(this).attr('id')==0)
			viewAll();
	});
	$('.AccordionMenu .subNav,ul.dropdown-menu').find('li > a').click(function(){
		$('#category').val($(this).attr('id'));
		$('#type').val('sub');
		$('#page').val('');
		searchAdd();
	});
	$('#main').find('li > h4 > a').live('click',function(){
		$('#category').val($(this).attr('id'));
		$('#type').val('main');
		$('#page').val('');
		$.ajax({url:'<?php echo Request::root()?>/get-sub-categories/'+$(this).attr('id'),success:function(result){$('#cat').html(result);}
		});
		searchAdd();
	});
	$('#sub').find('li > h4 > a').live('click',function(){
		$('#category').val($(this).attr('id'));
		$('#type').val('sub');
		$('#page').val('');
		searchAdd();
	});
	$('.pagination').find('a').live('click',function(evt){
		evt.preventDefault();
		$('.pagination li').each(function(index, element) {
            $(this).removeClass('active');
        });
		$(this).parent().addClass('active');
		$('#page').val($(this).attr('data-id'));
		searchAdd();
	});
	function viewAll()
	{
		$('#category').val(0);
		$('#type').val('main');
		$('#page').val('');
		$.ajax({url:'<?php echo Request::root()?>/get-main-categories',success:function(result){$('#cat').html(result);}
		});
		searchAdd();
	}
	function searchAdd()
	{
		var data=$('#search_form').serialize();
		if(xhr11!=null)
			xhr11.abort();
		xhr11=$.ajax({type:'post',url:'<?php echo Request::root()?>/search',data:data,success: function(output){
			$('#search_res').html(output);xhr11=null;
			}
			});	
		
	}

	
			$(".PostAd_anchr").click(function(e) {
				$(".myads_block").toggleClass("display");
			});
			 $(".bg").live('click',function(e) { 
				$(".myads_block").removeClass("display");
			});
            $(".register_r").click(function(e) {
                $(".comp_reg").removeClass("deactive");
				$(".applcnt_reg").addClass("deactive");
				$(".applcnt_reg_head").removeClass("active");
				$(".comp_reg_head").addClass("active"); 
            });
			$(".login_r").click(function(e) {
                $(".comp_reg").addClass("deactive");
				$(".applcnt_reg ").removeClass("deactive");
				$(".applcnt_reg_head").addClass("active");
				$(".comp_reg_head").removeClass("active"); 
            });
	var xhr11=null;		
	$('#login_submit').click(function(e){
		e.preventDefault();
		if($('#loginForm').valid()){
			var data=$('#loginForm').serialize();
			if(xhr11!=null)
				xhr11.abort();
			xhr11=$.ajax({data:data,url:'<?php echo Request::root()?>/login',dataType:"json",type:'post',async:false,success:function(result){
				if(result.message=='success'){
					$(document).ajaxStop(function(){
                		window.location.reload();
            		});
				}
				else{
					$('.applcnt_reg').find('p').next('p').remove();
					$('.applcnt_reg').find('p').after('<p>'+result.message+'</p>');
				}
			}
			});
		}
	});

	$('.add_del').live('click',function(ev){
		if(!confirm('Are you sure you want to delete?'))
			ev.preventDefault();
	});
	$('.main').click(function(){
		$(".myads_block").removeClass("display");
	});
	$('.Photo').live('click',function(){
		if($(this).parent().attr('data-id')===undefined){}
		else
			window.location="<?php echo Request::root()?>/product/"+$(this).parent().attr('data-id');
	});
	$('.brans').live('click',function(){
		$('#searchKey').val($(this).text());
		tmp=1;
		$('#searchKey').trigger('keypress');
	});
});
</script>

</body>
</html>