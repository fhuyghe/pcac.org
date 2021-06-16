<article @php post_class() @endphp>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="reports">< Back to All</a>
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
          <p>{{ the_excerpt() }}</p>
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
