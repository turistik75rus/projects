$(document).ready(function(){
	$("#mainsearchbtn").click(function(){
		var mi = $("#mainsearchinput");
		var fg = $(".main-search .form-group");
		var isopen = fg.hasClass("open");
		if(isopen) {
			var q = mi.val();
			if(q) {
				$(".main-search form").submit();
				return true;
			}
			fg.removeClass("open");
			mi.removeClass("open");
			$(".main-search .btn-search").removeClass("active");
			return false;
		} else {
			$(".main-search .btn-search").addClass("active");
			fg.addClass("open");
			mi.addClass("open").focus();
			return false;
		}	
	});
	$(document).click(function(e){		
		if($(e.target).is(".main-search, .main-search *")) return;
		if(!$(".main-search .form-group").hasClass("open")) return;
		$("#mainsearchinput").removeClass("open");
		$(".main-search .form-group").removeClass("open");
		$(".main-search .btn-search").removeClass("active");
	});
	$(".owl-carousel.fullwidth").owlCarousel({
		loop: false,
		nav: true,
		dots: true,
		navText: ["❮","❯"],
		margin: 30,
    	responsive: {
    		0: {
    			items: 2
    		}
    	}
	});
	$(".rolling > dt").click(function(e){
		$(this).parent().toggleClass("open");
	});
	/*$("a[rel^='prettyPhoto']").prettyPhoto({
		//theme: '',
		//"slideshow":3000,
		social_tools: false
	});
	var youTV = $(".youTV");
	if(youTV.length>0) {
		youTV.each(function(i,e) {
			var pl = $(e).data("playlist");
			var params = {responsive: true,
						chainVideos: true};
			if(pl) params.playlist = pl;
			else params.channelId = "UCumEVhREA_ht6qL306l8z3A";
			var id = $(e).attr("id");
			var yyv = new YTV(id,params);			
		});
	}*/
});

