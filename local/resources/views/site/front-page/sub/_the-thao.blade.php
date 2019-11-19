<div class="desk-grid" id='the_thao'>
    @foreach($the_thao_index as $row)
        <h3>Thể Thao</h3>
        <div class="desk">
            <table>
                <tr><a  href="{{route('site.singlePage',[
																'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																'post_name'=>str_slug($row->title),
																'post_id'=>$row->id
																])}}" class="title">
                        {{$row->title}}</a></tr>
                <tr>
                    <td><img src="{{$row->image_avatar}}" width="120px" alt="" />
                    <td><p>{{$row->quotes_content}}</p>
                    </td>
                </tr>
            </table>
        </div>
    @endforeach
    <ul>
        @foreach($the_thao_link as $row)
            <li> <a href="{{route('site.singlePage',[
																	'post_category'=>str_slug($row->getPostCategoryTable->post_cat_name),
																	'post_name'=>str_slug($row->title),
																	'post_id'=>$row->id
																	])}}" class="title">
                    {{$row->title}}</a></li>
        @endforeach
    </ul>

</div>