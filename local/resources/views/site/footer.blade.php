
        <!---Include Jquery---->
        <script type="text/javascript" src="{{asset('public/site/vendors/slick/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/site/js/jquery.leanModal.min.js')}}"></script>
        <script src="{{asset('public/site/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('public/site/js/jquery.flexisel.js')}}"></script>

        <!--############---Include Slick-Slide--#############-->
        <script type="application/javascript">
            $('.get-slick-bottom-block').slick({
                dots: false,
                infinite: true,
                autoplay:true,
                speed: 1000,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows:false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        </script>
    </body>
</html>