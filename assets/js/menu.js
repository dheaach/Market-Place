$(function(){
	
	var menu = $('#mnu'),
		pos = menu.offset();
		
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('normal')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('normal').addClass('tetap').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('tetap')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('tetap').addClass('normal').fadeIn('fast');
				});
			}
		});

});