@if($app_list)
    <?php /*$a = 1; */?>
    @foreach($app_list as $data)
        <tr>
            <td>{{$paginate++}}</td>

            <td>{{$data->title ?? 'NA'}}</td>
            <td>{{$data->slug ?? 'NA'}}</td>
            <td>{{$data->value ?? 'NA'}}</td>
            <td class="td-actions">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_form_modal" onclick="editForm({{$data}},'{{route('api.admin.app-config.edit',['id'=>$data->id])}}')"  style="margin-left: 255px" >
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" id="delete" class="btn btn-danger" onclick="appConfigDelete('{{route('api.admin.app-config.delete',['id'=>$data->id])}}')">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif
