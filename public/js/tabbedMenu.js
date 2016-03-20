/*! tabbedMenu v0.8 */

(function($) {
	var menuFocus = $('.AccordionMenu > li');
	var allMenus = $('.AccordionMenu > li + .subNav');
	//menuFocus = $('.AccordionMenu > li').removeClass('active');
	//allMenus = $('.AccordionMenu > li + .subNav').removeClass('active');

	$('.AccordionMenu > li').click(function(fe) {
		ob=$(this);
		nxtOb=ob.next('.subNav');
		if(nxtOb.attr('class')=='subNav active'){
			allMenus.removeClass('active');
			ob.removeClass('active');
			nxtOb.css('height',0);
		}else{
			menuFocus.removeClass('active');
			allMenus.removeClass('active');
			ob.toggleClass('active');
			nxtOb.toggleClass('active');
			allMenus.css('height',0);
			nxtOb.css('height',nxtOb.children('.AM-content').outerHeight());
		}
		return true;
	});
	
	$('.subNav .close').click(function(e) {
		menuFocus.removeClass('active');
		$('.AccordionMenu > li + .subNav').removeClass('active');
		$('body').removeClass('SubMenuOpen');
	});
})(jQuery);