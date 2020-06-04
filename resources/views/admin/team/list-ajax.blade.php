@if(count($team_list)>0)

    <?php /*$a = 1; */?>
    @foreach($team_list as $key => $data)
        <tr>
            <td>{{++$key}}</td>

            <td>{{$data->name ?? 'NA'}}</td>

            <td>{{$data->designation ?? 'NA'}}</td>

            <td>{{$data->facebook_url ?? 'NA'}}</td>
            <td>{{$data->twitter_url ?? 'NA'}}</td>
            <td>{{$data->linkedin_url ?? 'NA'}}</td>
            <td>{{$data->feed_url ?? 'NA'}}</td>

            <td><img src="{{asset('storage/team/'.$data->image ?? 'NA')}}" style="height:40px; width: 40px"></td>

            <td>{{\App\Team::$status_name[$data->status]}}</td>


            <td class="td-actions">
                <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.team.edit.view',['id'=>$data->id])}}'">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.team.delete',['id'=>$data->id])}}'">
                    <i class="fa fa-trash"></i>
                </button>
            </td>


        </tr>
    @endforeach


@else
    <td><h1>No Data</h1></td>
@endif
