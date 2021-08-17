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
	$(".komplphotos").owlCarousel({
		loop:false,
    	margin:30,
    	nav:true,
    	dots: true,
    	navText: ["❮","❯"],
    	responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1020:{
            items:3
        }
    }
	});
	$(".js-mainphoto").click(function(){
		$(".komplphotos img").removeClass("active");
		$(this).addClass("active");
		var href=$(this).data("href");
		if(href) $("#mainphoto").attr("src",href);
	});
	$(".komplphotos .owl-next").click(function(){
		var a = $(".komplphotos img.active");
		var n = a.parent().next().children("img");
		if(n.length<1) {
			return;
		}
		a.removeClass("active");
		n.addClass("active");
		var href=n.data("href");
		if(href) $("#mainphoto").attr("src",href);
	});	
	$(".komplphotos .owl-prev").click(function(){
		var a = $(".komplphotos img.active");
		var n = a.parent().prev().children("img");
		if(n.length<1) {
			return;
		}
		a.removeClass("active");
		n.addClass("active");
		var href=n.data("href");
		if(href) $("#mainphoto").attr("src",href);
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
	$("a[rel^='prettyPhoto']").prettyPhoto({
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
	}
        
        /*
         var allVideos = $("iframe[src^='https://www.youtube.com']"),
            fluidEl = $(".owl-item");



    allVideos.each(function () {
        $(this).data('aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
    });

    $(window).resize(function () {

        var newWidth = fluidEl.width();
        allVideos.each(function () {

            var el = $(this);
            el.width(newWidth).height(newWidth * el.data('aspectRatio'));

        });

    }).resize();
    */
   
$('#feedbackform').on('submit',function(event) {
    event.preventDefault();
    $('#message-modal').modal('show');
    $.post("/contact", $( "#feedbackform" ).serialize()); 
 });

$('#callbackform').on('submit', function(event) {
    event.preventDefault();
    $('#message-modal').modal('show');
    $('#callback').modal('hide');
    
    $.post("/callback", $( "#callbackform" ).serialize()); 
});
    
});


//# sourceMappingURL=ge.js.map
