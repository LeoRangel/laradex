$(document).on('scroll', function(){
    if($(document).scrollTop() > 400){
        $('.nav-hidden').fadeIn();
        $('nav').addClass('navbar-blue animated fadeIn');
    } else {
        $('.nav-hidden').fadeOut();
        $('nav').removeClass('navbar-blue animated fadeIn');
    }
});

// Trigger Scroll
$(document).ready(function(){
    var scrollLink = $('.scroll');
  
    // Smooth scrolling
    scrollLink.click(function(e) {
        e.preventDefault();
        $('body,html').animate({
        scrollTop: $(this.hash).offset().top
        }, 1000 );
    });

    $(window).scroll(function() {
        var scrollbarLocation = $(this).scrollTop();
        
        scrollLink.each(function() {
            
            var sectionOffset = $(this.hash).offset().top - 20;
            
            if ( sectionOffset <= scrollbarLocation ) {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            }
        });
    });
});