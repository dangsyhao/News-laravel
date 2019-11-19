<div class="photos">
    <h3>Da Nang - Gallery</h3>
    <div class="course_demo">
        <ul id="flexiselDemo">
            @foreach($du_lich_gallery as $row)
                <li>
                    <a  href="{{
                                route('site.singlePage',[
                                                        'post_category'=>str_slug($row->getMenuCategoryTable->post_cat_name),
                                                        'post_name'=>str_slug($row->title),
                                                        'post_id'=>$row->id
                                                        ])
                                }}">
                        <img src="{{$row->image_avatar}}" alt="" />
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
</div>