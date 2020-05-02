@if($enquiry_list)
    <?php /*$a = 1; */?>
    @foreach($enquiry_list as $key => $data)
        <tr>
            <td>{{$paginate++}}</td>

            <td>{{$data->name ?? 'NA'}}</td>

            <td>{{$data->email ?? 'NA'}}</td>

            <td>{{$data->phone ?? 'NA'}}</td>

            <td>{{$data->message ?? 'NA'}}</td>


        </tr>
    @endforeach
@endif