@if(count($records))
    @foreach($records as $record)
        <tr id="tableRecord-{{$record->id}}">
            <td>{{$record->id}}</td>
            @if(request()->query('view')=='trash')
                <td>{{$record->deletedBy ? $record->deletedBy->name : "NONE"}}</td>
                <td>{{ date('M d, Y', strtotime($record->deleted_at)) .'-'.date('h:i a', strtotime($record->deleted_at)) }}</td>
            @endif
            <td>{{$record->PhotoCategory?$record->PhotoCategory->name:"NONE"}}</td>
            <td>
                <div>

                    <img style="
                                         width: 100px;
                                         padding: 10px;" src="{{ asset('storage/'.$record->image) }}" id="img_url">

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
                        onclick="injectModalData('{{$record->id}}', '{{route('admins.photo.restore')}}', 'confirm-password-form', 'POST')"
                    >
                        <i class="fa fa-undo" style="color: #fff"></i>
                    </a>
                    <a
                        class="btn btn-sm btn-danger"
                        title="Destroy"
                        data-toggle="modal"
                        data-target="#confirm-password-modal"
                        onclick="injectModalData('{{$record->id}}', '{{route('admins.photo.destroy', $record->id)}}', 'confirm-password-form', 'DELETE')"
                    >
                        <i class="fa fa-trash" style="color: #fff"></i>
                    </a>
                @else
                    <a
                        href="{{route('admins.photo.edit',$record->id)}}"
                        title="Edit"
                        class="btn btn-sm btn-primary">
                        <i class="fa fa-edit" style="color: #fff"></i>
                    </a>
                        <a
                            class="btn btn-sm btn-danger"
                            title="Remove"
                            data-toggle="modal"
                            data-target="#confirm-password-modal"
                            onclick="injectModalData('{{$record->id}}', '{{route('admins.photo.trash')}}', 'confirm-password-form', 'POST')" >
                            <i class="fa fa-trash" style="color: #fff"></i>
                        </a>
                    <a
                        href="{{route('admins.photo.colour',$record->id)}}"
                        title="Add Colours"
                        class="btn btn-sm btn-focus">

                        <i class="fa fa-plus" style="color:  #fff"></i>
                    </a>
                    <a
                        href="{{route('admins.photo.colours.view',$record->id)}}"
                        title="Edit Colours"
                        class="btn btn-sm btn-focus">

                        <i class="fa fa-edit" style="color:  #fff"></i>
                    </a>
{{--                    <a--}}
{{--                        href="{{route('admins.photo.delete.colour',$record->id)}}"--}}
{{--                        title="Delete Colour"--}}
{{--                        class="btn btn-sm btn-danger">--}}

{{--                        <i class="fa fa-trash-alt" style="color:  #fff"></i>--}}
{{--                    </a>--}}
                    <a
                        href="{{route('admins.photo.sections',$record->id).'?view=section'}}"
                        title="Show Sections"
                        class="btn btn-sm btn-primary">

                        <i class="fa fa-eye" style="color:  #fff"></i>
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

