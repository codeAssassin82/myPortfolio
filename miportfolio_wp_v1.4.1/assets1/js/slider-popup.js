(function() {

 /* -------- carusel-slider -------- */
		$('.trigger-overlay').click(function(){
			$(this).closest('.portfolio-wrap').find('.overlay1').addClass('open');
		});
		$('.overlay-close').click(function(){
			$('.overlay1.open').removeClass('open');
		});

/* -------- info-slider -------- */
		$('.slider-info').click(function(e){
			$(".vbox-overlay").toggleClass("vbox-overlay-new");
			$(this).closest(".portfolio-wrap").find(".slider-video-content").addClass("visible");
			$(this).closest(".portfolio-wrap").find(".slider_content").removeClass("hidden");
			$(".wraper-slider-content").toggleClass("animated slideInRight show");
		});

		$('.close-info-bt').click(function(e){
			$(".slider-video-content").removeClass("visible");
			$(".wraper-slider-content").removeClass("animated slideInRight show");
		});

})();
