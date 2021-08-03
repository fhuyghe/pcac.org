<article @php post_class() @endphp>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="/reports"><i class="fal fa-arrow-left"></i> Back to All</a>
          <h1 class="entry-title">{!! get_the_title() !!}</h1>

          @php $pdf = get_field('pdf_link') @endphp
          @if($pdf)
            <a class="button" href="{{ $pdf }}" target="_blank">Full Report</a>
          @endif
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
