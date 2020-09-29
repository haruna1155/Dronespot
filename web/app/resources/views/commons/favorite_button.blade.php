@if (Auth::id() != $post->id)
    @if (Auth::user() && Auth::user()->is_favorites($post->id))
        {{--unfavorite--}}
        {!! Form::open(['route' => ['unfavorite', $post->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-star"></i>', ['class' => "btn btn-outline-warning btn-sm", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {{-- favorite--}}
        {!! Form::open(['route' => ['favorite', $post->id]]) !!}
            {!! Form::button('<i class="far fa-star"></i>', ['class' => "btn btn-outline-warning btn-sm", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif
@endif
