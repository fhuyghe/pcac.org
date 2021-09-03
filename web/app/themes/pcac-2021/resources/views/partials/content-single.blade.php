<article @php post_class() @endphp>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-6 text">
          @if(in_category(112))
            <a href="/{{ get_the_terms($post, 'council')[0]->slug }}/meeting-minutes/"><i class="fal fa-arrow-left"></i> Back to All</a>
          @else
            <a href="/commentary"><i class="fal fa-arrow-left"></i> Back to All</a>
          @endif
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
          @include('partials/entry-meta')
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
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
