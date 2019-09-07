

document.addEventListener("touchstart", function () {}, false);



$(function () {

	$('#wsnavtoggle').click(function () {
		$('.wsmenucontainer').toggleClass('wsoffcanvasopener');
	});

	$('.overlapblackbg').click(function () {
		$('.wsmenucontainer').removeClass('wsoffcanvasopener');
	});

	$('.wsmenu-list> li').has('.wsmenu-submenu').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	$('.wsmenu-list > li').has('.wsshoptabing').prepend('<span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');

	$('.wsmenu-click').click(function () {
		$(this).toggleClass('ws-activearrow').parent().siblings().children().removeClass('ws-activearrow');
		$(".wsmenu-submenu, .wsshoptabing").not($(this).siblings('.wsmenu-submenu, .wsshoptabing')).slideUp('slow');
		$(this).siblings('.wsmenu-submenu, .wsshoptabing').slideToggle('slow');
	});

	$('.wsmenu-list > li > ul > li').has('.wsmenu-submenu-sub').prepend('<span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span>');
	$('.wsmenu-list > li > ul > li > ul > li').has('.wsmenu-submenu-sub-sub').prepend('<span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i>	</span>');

	$('.wsmenu-click02').click(function () {
		$(this).children('.wsmenu-arrow').toggleClass('wsmenu-rotate');
		$(this).siblings('.wsmenu-submenu-sub').slideToggle('fast');
		$(this).siblings('.wsmenu-submenu-sub-sub').slideToggle('fast');
	});

});

$(window).on('load', function () {

	

	$("#allcategories .wstabitem .mega_menu_category_item").on('mouseenter', function () {


		$(this).addClass("wsshoplink-active").siblings(this).removeClass("wsshoplink-active");



	});




	$("#main_mega_menu").on('mouseenter', function () {


		$(".mega_menu_category_item").first().addClass("wsshoplink-active").siblings().removeClass("wsshoplink-active");

		$(".mega_menu_content_item").first().addClass("wsshoptab-active").siblings().removeClass("wsshoptab-active");

	});






	$("#allcategories .wstabitem li a").on('mouseenter', function () {


		$("#allcategories .wstabcontent").find("> div").siblings().removeClass("wsshoptab-active");
		$($(this).attr("href")).addClass("wsshoptab-active");




	});


	$("#allbrands .wstabitem02 li").on('mouseenter', function () {
		$(this).addClass("wsshoplink-active").siblings(this).removeClass("wsshoplink-active");
	});

	$("#allbrands .wstabitem02 li a").on('mouseenter', function () {
		$("#allbrands .wstabcontent02").find("> div").siblings().removeClass("wsshoptab-active");
		$($(this).attr("href")).addClass("wsshoptab-active");
	});

	$(".wscarticon > a").on('click', function () {
		$(".wscarticon").toggleClass("wsopensmallcheckout");
	})

	$("body").click(function () {
		$(".wscarticon").removeClass('wsopensmallcheckout');
	});

	$(".wscarticon > a").click(function (e) {
		e.stopPropagation();
	});

});

$(document).ready(function () {


	var courses = new Bloodhound({
		datumTokenizer: function (a) { return [a.Name]; },
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '../../json/info.json'
	});

	var masters = new Bloodhound({
		datumTokenizer: function (b) { return [b.Name]; },
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '../../json/info.json'
	});

	var specialization = new Bloodhound({
		datumTokenizer: function (c) { return [c.Name]; },
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '../../json/info.json'
	});

	
	  $('#multiple-datasets .typeahead').typeahead({

		hint: true,
		highlight: true,
		minLength: 1

	  },
	  {
		name: 'courses-name',
		display: 'Name',
		source: courses,
		limit: 3,
		templates: {
		  header: '<h3 class="league-name">Courses</h3>',
		}
	  },
	  {
		name: 'masters-name',
		display: 'Name',
		source: masters,
		limit: 3,
		templates: {
		  header: '<h3 class="league-name">Masters</h3>'
		},

	  },
	  {
		name: 'specialization-name',
		display: 'Name',
		source: specialization,
		limit: 3,
		templates: {
		  header: '<h3 class="league-name">Specialization</h3>'
		},

	  }).on('typeahead:selected', function(e, data) {
		$('.topmenusearch').submit();
	  });


	  



	
	let numberChecked = $('.notifications-menu input[type="checkbox"]').filter(function() {
		return this.checked;
	}).length;


	$('.notifications-menu input:checkbox:not(:checked)').prop('disabled', true);
	$('.notifications-conter').text(numberChecked);





	// $('.notifications-menu input').is(':checked').parent().removeAttr("data-tooltip"); 





	$('.notifications-menu input[type="checkbox"]').change(function() {

		$('.notifications-menu input:checkbox:not(:checked)').prop('disabled', true);

		let testchecked = $('.notifications-menu input[type="checkbox"]').filter(function() {
			return this.checked;
		}).length;

		$('.notifications-conter').text(testchecked);


		if(testchecked == 0){

			$('.notifications-conter').hide();

			$('.notifications-top').after('<div id="space">No New Notifications</div>');

			$('#markAllAsRead').remove();

		}

		$(this).parent().removeAttr("data-tooltip");


		$(this).parent().parent().parent().remove();

       
	});


	$('#markAllAsRead').click(function () {

		$('.notifications-menu input[type="checkbox"]').prop('checked', false);
		$('.notifications-conter').hide();
		$(this).hide();
		$('.notifications-menu input[type="checkbox"]').parent().parent().parent().remove();


		$('.notifications-top').after('<div id="space">No New Notifications</div>');



	});





});