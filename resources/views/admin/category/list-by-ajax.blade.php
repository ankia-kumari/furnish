@if($category_list)
    <?php /*$a = 1; */?>
    @foreach($category_list as $key => $data)
        <tr>
            <td>{{$paginate++}}</td>
            <td>{{$data->title ?? 'NA'}}</td>
            <td>{!! $data->description ?? 'NA' !!}</td>

            <td><img src="{{asset('storage/category/'.$data->image)}}" style="height:40px; width: 40px"></td>

            <td>{{\App\Category::$status_name[$data->status]}}</td>
            <td>{{\App\Category::$theme_name[$data->theme]}}</td>

            <td class="td-actions">
                <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.category.edit.view',['id'=>$data->id])}}'">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.category.delete',['id'=>$data->id])}}'">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif
