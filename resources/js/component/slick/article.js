
$('.slick-nb').slick({
  centerPadding: '20px',
  slidesToShow: 4,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

$('.slick-ct').slick({
  centerPadding: '20px',
  slidesToShow: 4,
  autoplay: true,
  autoplaySpeed: 1800,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

$('.slick-b').slick({
  centerPadding: '20px',
  slidesToShow: 4,
  autoplay: true,
  autoplaySpeed: 1600,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
$('.slick-bv').slick({
  centerPadding: '20px',
  slidesToShow: 4,
//  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
        breakpoint: 1024,
        settings: {
          arrows: false,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 2
      }
    }
  ]
});



