
        <!---Include Jquery---->
        <script type="text/javascript" src="{{asset('/vendors/slick/slick/slick.min.js')}}"></script>

        <!--############---JQUERY PLUGINS--#############-->

        <!--Facebook Comment-->
        @if(isset($_REQUEST['post_id']))
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=2152285088351327&autoLogAppEvents=1';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        @endif

        <!--Slick - Slider Setup !-->
        <script type="application/javascript">
            $('.get-slick-ban_doc-block').slick({
                dots: false,
                infinite: true,
                autoplay:true,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows:false,
                variableWidth: false,
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
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            //Du Lịch Đà Nẵng
            $('.get-slick-bottom-block').slick({
                    dots: false,
                    infinite: true,
                    autoplay:true,
                    speed: 1000,
                    slidesToShow: 3,
                    slidesToScroll: 1,
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
                    ]
            });
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        </script>
    </body>
</html>