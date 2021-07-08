<div class="member-block col-md-4">
    <div class="portrait">
        @if(has_post_thumbnail())
            {!! the_post_thumbnail('medium') !!}
        @else
            <img class="default" src="@asset('images/default-avatar.png')" />
        @endif
    </div>
    <div class="name">
        <h3><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
        @php $title = get_field('title') @endphp
        @if($title)
            <h6 class="themed">{{ $title }}</h6>
        @endif
    </div>
    <div class="info">
        @php $appointed = get_field('appointed') @endphp
        @if($appointed)
        <p>Appointed: {{ $appointed }}</p>
        @endif

        @php $recommended = get_field('recommended') @endphp
        @if($recommended)
            <p>Recommended by: {{ $recommended }}</p>
        @endif
    </div>
</div>