@if($post_list)
    <?php /*$a = 1; */?>
    @foreach($post_list as $key => $data)
        <tr>
            <td>{{$paginate++}}</td>
            <td>{{$data->title ?? 'NA'}}</td>

            <td>{{$data->description ?? 'NA'}}</td>


            <td><img src="{{asset('storage/post/'.$data->image)}}" style="height:40px; width: 40px"></td>

            <td>{{\App\Post::$status_name[$data->status]}}</td>

            <td>{{$data->views ?? 'NA'}}</td>

            <td>{{$data->userRelation->name ?? 'NA'}}</td>

            <td class="td-actions">
                <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.post.edit.view',['id'=>$data->id])}}'">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.post.delete',['id'=>$data->id])}}'">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif