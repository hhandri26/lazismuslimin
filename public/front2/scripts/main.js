$('#recipeCarousel').carousel({
  interval: 5000
})

$('.carousel-2 .carousel-item-2').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

$('.navbar a').on('click', function (e) {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

   if (this.hash !== '') {
      e.preventDefault();

      const hash = this.hash;

      $('html, body')
         .animate({
            scrollTop: $(hash).offset().top - 120
         }, 800);
   }
});