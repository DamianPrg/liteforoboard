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
</div>