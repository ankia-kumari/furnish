@if($app_list)
    <?php /*$a = 1; */?>
    @foreach($app_list as $data)
        <tr>
            <td>{{$paginate++}}</td>

            <td>{{$data->title ?? 'NA'}}</td>
            <td>{{$data->slug ?? 'NA'}}</td>
            <td>{{$data->value ?? 'NA'}}</td>
            <td class="td-actions">
                <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.app-configuration.edit.view',['id'=>$data->id])}}'">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.app-configuration.delete',['id'=>$data->id])}}'">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif