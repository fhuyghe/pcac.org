<div class="member-block col-md-4">
    <div class="portrait">
        {!! the_post_thumbnail('medium') !!}
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