function resizeMenu(){
	var w = $('.sidePanel').width();
	$('.sidePanel > .wrapper').css('width',w);
}
$(document).ready(function(e) {
	var xhr1=null;
	resizeMenu();
    $('.nav select').combobox();
	
	
//* Cards Menu Begins */	
	(function($) {
		$('ul.ProList > li').live('click',function() {
			var Cards = $('ul.ProList > li').removeClass('active');	
			Cards.removeClass('active');
			$(this).toggleClass('active');
			return true;
		});
	})(jQuery);
	var cUrl=window.location.href;
	var flag=1;
	var location=cUrl.split('/');
	if(location[location.length-1]=='adds' && location[location.length-2]!='admin')
		flag=0;
	if(location[location.length-4]=='users')
		flag=0;	

	$('a.close').live('click',function(){
		var deletes=$(this);
		 $( "#dialog-confirm" ).dialog({
			resizable: false,
			height:140,
			modal: true,
			dragable:false,
			buttons: {
			"Delete": function() {
				var removed=deletes.next('.dz-details').find('.file_name').val();
				deletes.parent().remove();
				var old=$('#removed_files').val();
				$('#removed_files').val(old+removed+',');
				$( this ).dialog( "close" );
				if(deletes.attr('data-title')=="already"){
					var removed=deletes.next().val();
					var old=$('#removed_old_files').val();
					$('#removed_old_files').val(old+removed+',');
					var removed=deletes.next().next().val();
					var old=$('#old_files').val();
					$('#old_files').val(old+removed+',');
				}
			},
			Cancel: function() {
			$( this ).dialog( "close" );
			}
			}
		});
	});

$(window).resize(function(e) {
    resizeMenu();
});
						   });
