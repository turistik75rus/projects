<div class="halfcard">
    <a href="{{ $blocks[$id]['url'] }}">
        <img src="{{$blocks[$id]['img']}}" class="halfcard-image">
        @if( $blocks[$id]['title'] != '')
        <div class="cattitle {{$color}}">{{$blocks[$id]['title']}}</div>
        @endif
    </a>
</div>