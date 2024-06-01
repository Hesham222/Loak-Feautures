@if(count($records))
    @foreach($records as $section)
        <tr id="tableRecord-{{$section->id}}">
            <td>{{$section->id}}</td>
            @if(request()->query('view')=='trash')
                <td>{{$section->deletedBy ? $section->deletedBy->name : "NONE"}}</td>
                <td>{{ date('M d, Y', strtotime($section->deleted_at)) .'-'.date('h:i a', strtotime($section->deleted_at)) }}</td>
            @endif
            <td>{{$section->ProjectSectionType->name}}</td>
            <td>{{$section->name?$section->name:"NONE"}}</td>
            <td>{{$section->order ?$section->order:"NONE"}}</td>
            <td>{{ date('M d, Y', strtotime($section->created_at)) .'-'.date('h:i a', strtotime($section->created_at)) }}</td>
            <td>
                <a
                    href="{{route('admins.project.edit.section',$section->id)}}"
                    title="Edit Section"
                    class="btn btn-sm btn-primary">
                    <i class="fa fa-edit" style="color: #fff"></i>
                </a>
                <a
                    class="btn btn-sm btn-danger"
                    title="Destroy Section"
                    data-toggle="modal"
                    data-target="#confirm-password-modal"
                    onclick="injectModalData('{{$section->id}}', '{{route('admins.project.destroy.section', $section->id)}}', 'confirm-password-form', 'DELETE')"
                >
                    <i class="fa fa-trash" style="color: #fff"></i>
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" style="text-align:center;">
            There are no records match your inputs.
        </td>
    </tr>
@endif
