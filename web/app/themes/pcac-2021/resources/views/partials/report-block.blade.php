<div class="post-block report">
    <div class="date">
        {{the_date('Y')}}
    </div>
    <div class="thumbnail">
        {{ the_post_thumbnail('medium') }}
    </div>
    <h4>{{ the_title() }}</h4>
    <footer>
        <a class="button" href="{{ the_permalink() }}">Read Online</a>
        @php $pdf = get_field('pdf_link') @endphp
        @if($pdf)
        <a class="button" href="{{ $pdf }}" target="_blank">PDF</a>
        @endif
    </footer>
</div>