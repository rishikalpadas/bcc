(function ($) {
	"use strict";
	var healthcare = {
		initialised: false,
		version: 1.0,
		Solar: false,
		init: function () {

			if(!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			// Functions Calling

			this.menu_toggle();
			this.submenu();
			this.filter();
			this.counter();
			this.testimonial_thumb();
			this.go_top();
			this.preloader();
        },
        // menu toggle start
		menu_toggle: function () {
			if($(".hc-main-header").length > 0){
                $(".hc-menu-toggle").on('click',function(e){
                    event.stopPropagation();
                    $(".hc-main-header").toggleClass("hc-open-menu");
                });
                $("body").on('click',function(){
                    $(".hc-main-header").removeClass("hc-open-menu");
                });
                $(".hc-navbar").on('click',function(){
                    event.stopPropagation();
                });
            };
		},
		// menu toggle end
        // menu toggle start
		submenu: function () {
			if($(".hc-has-submenu").length > 0){
                $(".hc-has-submenu").on('click',function(){
                    $(".hc-submenu").slideToggle();
                });
            };
		},
		// menu toggle end
		// filter
		filter: function () {
			$(window).on('load', function() { 
				$('.hc-team-grid').isotope({
					itemSelector: '.hc-team-box',
					filter: '*'
				});
				$('.hc-team-tab-list > ul > li').on( 'click', 'a', function() {
					var filterValue = $( this ).attr('data-filter');
					$('.hc-team-grid').isotope({ filter: filterValue });
					$('a').removeClass('hc-team-tab-active');
					$(this).addClass('hc-team-tab-active');
				});
			});
		},
		// counter start
        counter: function() {
            if($('.hc-counter').length > 0){
                var a = 0;
                $(window).scroll(function() {
                    var oTop = $('#counter').offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() > oTop) {
                    $('.counter-value').each(function() {
                        var $this = $(this),
                        countTo = $this.attr('data-count');
                        $({
                        countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        },
                        {
                            duration: 5000,
                            easing: 'swing',
                            step: function() {
                            	$this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
								$this.text(this.countNum);
                            }
                        });
                    });
                    a = 1;
                    }
                });
            }
        },
        // counter end
        // testimonial start
        testimonial_thumb: function () { 
            if($('.hc-testi-slide').length > 0){
                var galleryTop  = new Swiper('.hc-testi-slide .gallery-top', {
                    spaceBetween: 10,
                    loop: true,
                    speed:800,
                    touchRatio: 0,
                    loopedSlides: 5, //looped slides should be the same
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    thumbs: {
                        swiper: galleryThumbs,
                    },
                });
            }
            if($('.hc-testi-thumb').length > 0){
                var galleryThumbs = new Swiper('.hc-testi-thumb .gallery-thumbs', {
                    spaceBetween: 10,
                    slidesPerView: 3,
                    loop: true,
                    speed:800,
                    freeMode: true,
                    centeredSlides:true,
                    touchRatio: 0,
                    loopedSlides: 5,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    effect: 'coverflow',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 420,
                        depth: 400,
                        modifier: 1,
                        slideShadows : true,
                    },
                    breakpoints: {
                        480: {
                            coverflowEffect: {
                                stretch: 500,
                            },
                        },
                        575: {
                            coverflowEffect: {
                                stretch: 500,
                            },
                        },
                        767: {
                            coverflowEffect: {
                                stretch: 260,
                            },
                        },
                        991: {
                            coverflowEffect: {
                                stretch: 330,
                            },
                        },
                    },
                });
            }
        },
        // testimonial end
        // go to start
        go_top: function () {
        	$(window).on('scroll', function () {
        		var scroll = $(window).scrollTop();
        		if($('.hc-main-header').length > 0){
        			var header_height = $('.hc-main-header').innerHeight();
        			if ( scroll >= header_height ) {
        				$(".hc-main-header").addClass("hc-header-sticky");
        			}else{
        				$(".hc-main-header").removeClass("hc-header-sticky");
        			}
        		}
        		if($('.hc-go-top').length > 0){
        			if (scroll >= 300) {
        				$(".hc-go-top").addClass("hc-go-top-show");
        			} else {
        				$(".hc-go-top").removeClass("hc-go-top-show");
        			}
        		}
                if($('.hc-go-top').length > 0){
                    $('.hc-go-top').on('click', function(){
                        $(window).scrollTop(0);
                    });
                }
        	});
		},
        // go to end
        preloader: function () {
			jQuery("#status").fadeOut();
			jQuery("#hc-preloader").delay(350).fadeOut("slow");	
		},
    };
    healthcare.init();
})(jQuery);

// Contact Form Submission
function checkRequire(formId , targetResp){
    targetResp.html('');
    var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
    var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
    var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
    var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
    var check = 0;
    $('#er_msg').remove();
    var target = (typeof formId == 'object')? $(formId):$('#'+formId);
    target.find('input , textarea , select').each(function(){
        if($(this).hasClass('require')){
            if($(this).val().trim() == ''){
                check = 1;
                $(this).focus();
                $(this).parent('div').addClass('form_error');
                targetResp.html('You missed out some fields.');
                $(this).addClass('error');
                return false;
            }else{
                $(this).removeClass('error');
                $(this).parent('div').removeClass('form_error');
            }
        }
        if($(this).val().trim() != ''){
            var valid = $(this).attr('data-valid');
            if(typeof valid != 'undefined'){
                if(!eval(valid).test($(this).val().trim())){
                    $(this).addClass('error');
                    $(this).focus();
                    check = 1;
                    targetResp.html($(this).attr('data-error'));
                    return false;
                }else{
                    $(this).removeClass('error');
                }
            }
        }
    });
    return check;
}
$(".submitForm").on('click', function() {
    var _this = $(this);
    var targetForm = _this.closest('form');
    var errroTarget = targetForm.find('.response');
    var check = checkRequire(targetForm , errroTarget);
    
    if(check == 0){
       var formDetail = new FormData(targetForm[0]);
        formDetail.append('form_type' , _this.attr('form-type'));
        $.ajax({
            method : 'post',
            url : 'ajaxmail.php',
            data:formDetail,
            cache:false,
            contentType: false,
            processData: false
        }).done(function(resp){
            console.log(resp);
            if(resp == 1){
                targetForm.find('input').val('');
                targetForm.find('textarea').val('');
                errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
            }else{
                errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
            }
        });
    }
});