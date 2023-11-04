$(document).ready(function() {
  
    /* Small card slider */ 
    $('.slider').slick({
      arrows: false,
      dots: false,
      infinite: true,
      initialSlide: 0,
      slidesToScroll: 1,
      slidesToShow: 3
    });
    
    const slider = $(".slider");
    var scrollCount = null;
  var scroll= null;
  
    slider.on('wheel', (function(e) {
      e.preventDefault();
      
      clearTimeout(scroll);
      scroll = setTimeout(function(){scrollCount=0;}, 200);
      if(scrollCount) return 0;
      scrollCount=1;
  
      if (e.originalEvent.deltaY < 0) {
        $(this).slick('slickNext');
      } else {
        $(this).slick('slickPrev');
      }
    }));
   
    /* Big cards slider */ 
    $('.slider-big-cards').slick({
      arrows: false,
      dots: false,
      infinite: true,
      initialSlide: 0.5,
      slidesToScroll: 1,
      slidesToShow: 3.5
    });
  });