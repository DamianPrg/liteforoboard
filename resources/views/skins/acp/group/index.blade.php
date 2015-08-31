@extends($acpLayout)

@section('content')

    <div style='margin-top: 8px; margin-bottom: 8px;'>
    <a href='{{route('acp.groups.create')}}' class='btn btn-primary btn-sm'>Create Group</a>
    </div>

    <div class='flex-table'>

        <div class='flex-head-row'>
            <div class='flex-col-id'>ID</div>
            <div class='flex-col'>Name / Badge</div>
            <div class='flex-col'></div>
        </div>

        @foreach($groups as $group)
            <div class='flex-row'>
                <div class='flex-col-id'>{{$group->id}}</div>
                <div data-toggle="tooltip" title="Badge" class='flex-col'>{!! $group->badge() !!}</div>
                <div class='flex-col-fixed'>
                    &nbsp;

                    <a data-toggle="tooltip" title="Remove group" class='btn btn-danger btn-xs'><i class='fa fa-remove fa-fw'></i></a>
                    <a href='{{route('acp.groups.edit', [$group->id])}}' data-toggle="tooltip" title="Edit group" class='btn btn-default btn-xs'><i class='fa fa-pencil fa-fw'></i></a>


                </div>
            </div>
        @endforeach

    </div>

@endsection