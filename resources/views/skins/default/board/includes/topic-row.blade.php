@inject('auth', 'App\Auth')
<div class='row topic-row'>
    <div class='row-fixed-column' style='font-size:16px;'>
        <i class="fa fa-comments-o fa-fw"></i>

        @if($topic->pinned)
            <i class="fa fa-thumb-tack fa-fw" style=""></i>
        @endif

        @if($topic->locked)
            <i class="fa fa-lock fa-fw"></i>

        @endif
    </div>

    <div class='row-dynamic-column'>
        {!! $topic->link()  !!}
    </div>

    <div class='row-fixed-column' style='max-width: 200px;'>
        {{ $topic->posts()->count()-1  }} replies
    </div>

    <div class='row-fixed-column' style='max-width:200px;'>
        {!! $topic->author->link() !!}, {!! $topic->created_at !!}
    </div>

    @if($auth->isStaff())
    <div class='row-fixed-column'>
        <div class="btn-group btn-group-sm">
            <button id='remove' type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove topict"><i class='fa fa-remove fa-fw'></i></button>
            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Pin/Unpin topic"><i class="fa fa-thumb-tack"></i>
            </button>
            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Lock/Unlock topic"><i class='fa fa-lock fa-fw'></i></button>
        </div>
    </div>
        @endif
</div>