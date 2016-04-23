(function() {

	     /* -------- carusel-slider -------- */
				$('.trigger-overlay').click(function(){
					$(this).closest('.wpb_wrapper').find('.overlay1').addClass('open');
				});
				$('.overlay-close').click(function(){
					$('.overlay1.open').removeClass('open');
				});

	
	     /* -------- info-slider -------- */
                  $('.slider-info').click(function(e){
					  $(".vbox-overlay").toggleClass("vbox-overlay-new");
					  $(this).closest(".wpb_wrapper").find(".slider-video-content").addClass("visible");
					  $(this).closest(".wpb_wrapper").find(".slider_content").removeClass("hidden");
					  $(".wraper-slider-content").toggleClass("animated slideInRight show");
				 });

				$('.close-info-bt').click(function(e){
					$(".slider-video-content").removeClass("visible");
					$(".wraper-slider-content").removeClass("animated slideInRight show");
				});
         /* -------- close-slider -------- */
				$('.overlay-close').click(function(e){
				$(vars.thumb_tray).css('opacity','0')
});
})();
