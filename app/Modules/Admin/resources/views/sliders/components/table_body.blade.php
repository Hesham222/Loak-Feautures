@if(count($records))
    @foreach($records as $record)
        <tr id="tableRecord-{{$record->id}}">
            <td>{{$record->id}}</td>
            @if(request()->query('view')=='trash')
                <td>{{$record->deletedBy ? $record->deletedBy->name : "NONE"}}</td>
                <td>{{ date('M d, Y', strtotime($record->deleted_at)) .'-'.date('h:i a', strtotime($record->deleted_at)) }}</td>
            @endif
            <td>{{$record->type?$record->type:"NONE"}}</td>
            <td>
                <div>

                    @if($record->attachment)
                        @if(in_array(pathinfo($record->attachment, PATHINFO_EXTENSION) ,$video_extensions))
                            <a target="_blank" href="{{asset('storage'.DS().$record->attachment)}}">View video</a>
                            <input type="hidden" name="mp4" value="{{ $record->attachment}}">
                        @else
                            @if(filter_var($record->attachment, FILTER_VALIDATE_URL))
                                <img src="{{ $record->attachment }}" alt="image-not-uploaded" style="
                                         width: 100px;
                                         padding: 10px;"></td>
                    @else
                        <img style="
                                         width: 100px;
                                         padding: 10px;" src="{{ asset('storage/'.$record->attachment) }}" id="img_url">
                @endif
                @endif
                @endif

                </div>
            </td>

            <td>{{ date('M d, Y', strtotime($record->created_at)) .'-'.date('h:i a', strtotime($record->created_at)) }}</td>
            <td>
                @if(request()->query('view')=='trash')
                    <a
                        class="btn btn-sm btn-primary"
                        title="Restore"
                        data-toggle="modal"
                        data-target="#confirm-password-modal"
                        onclick="injectModalData('{{$record->id}}', '{{route('admins.slider.restore')}}', 'confirm-password-form', 'POST')"
                    >
                        <i class="fa fa-undo" style="color: #fff"></i>
                    </a>
                    <a
                        class="btn btn-sm btn-danger"
                        title="Destroy"
                        data-toggle="modal"
                        data-target="#confirm-password-modal"
                        onclick="injectModalData('{{$record->id}}', '{{route('admins.slider.destroy', $record->id)}}', 'confirm-password-form', 'DELETE')"
                    >
                        <i class="fa fa-trash" style="color: #fff"></i>
                    </a>
                @else
                        <a
                            class="btn btn-sm btn-danger"
                            title="Remove"
                            data-toggle="modal"
                            data-target="#confirm-password-modal"
                            onclick="injectModalData('{{$record->id}}', '{{route('admins.slider.trash')}}', 'confirm-password-form', 'POST')" >
                            <i class="fa fa-trash" style="color: #fff"></i>
                        </a>

            @endif


        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" style="text-align:center;">
            There are no records match your inputs.
        </td>
    </tr>
@endif

