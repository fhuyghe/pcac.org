<article @php post_class() @endphp>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="/reports"><i class="fal fa-arrow-left"></i> Back to All</a>
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
          <ul class="links">
          @php $pdf = get_field('post_file') @endphp
          @if($pdf)
            <li>
              <a class="button" href="{{ $pdf }}" target="_blank">Full Report</a>
            </li>
          @endif
          @php $links = get_field('links') @endphp
          @foreach ($links as $link)
            <li>
              <a class="button" href="{{ $link['link'] }}" target="_blank">{{ $link['name'] }}</a>
            </li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="thumbnail">
      {{ the_post_thumbnail('large') }}
    </div>
  </header>
  <div class="entry-content">
    <div class="container">
      @php the_content() @endphp
    </div>
  </div>
  <footer>
  </footer>
</article>
