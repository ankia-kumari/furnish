@if($service_list)
                            <?php /*$a = 1; */?>
                            @foreach($service_list as $key => $data)
                                <tr>
                                    <td>{{++$key}}</td>

                                    <td>{{$data->title ?? 'NA'}}</td>

                                    <td>{{$data->description ?? 'NA'}}</td>

                                    <td><i class="{{$data->icon}}" style="font-size:55px"></i></td>

                                    <td>{{\App\Service::$status_name[$data->status]}}</td>

                                    <td>{{\App\Service::$theme_name[$data->theme]}}</td>

                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href = '{{route('admin.service.edit.view',['id'=>$data->id])}}'">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href = '{{route('admin.service.delete',['id'=> $data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
