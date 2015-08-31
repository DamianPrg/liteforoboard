@extends($acpLayout)

@section('page_title') Group edit @endsection
@section('page_desc') Group edit @endsection


@section('content')

    <form>
        <div class='form-group'>
            <label for='name'>Group name</label> <input name='name' class='form-control' value='{{$group->name}}'>
        </div>
        <div class='form-group'>
            <label for='color'>Group color</label> <input name='color' class='form-control' value='{{$group->color}}'>
        </div>

        <br>
       <span class='text-muted'> Permissions:</span>
    <div>
        <input type='checkbox' @if($group->hasPermission('access', 'acp')) checked @endif> AdminCP <span class='text-muted'>(User will be administrator with this permission)</span>
        <br>
        <input type='checkbox' @if($group->hasPermission('access', 'modcp')) checked @endif> ModCP <span class='text-muted'>(User will be moderator with this permission)</span>
        <br>
        <input type='checkbox'> Special <span class='text-muted'>(User with this group can't be banned, reported, etc...)</span>
        <br>
        <br>
        <input type='checkbox'> Login <span class='text-muted'>(User will be able to login even if site is closed)</span>
    </div>

        <div style='text-align:center;'>
                <button class='btn btn-primary' type='submit'><i class=''></i> Update</button>
        </div>


    </form>

@endsection