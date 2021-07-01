<article @php post_class() @endphp>
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="/about"><i class="fal fa-arrow-left"></i> Back to All</a>
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
          <h6>{{ the_field('title') }}</h6>
          @php the_content() @endphp
        </div>
        <div class="col-md-6">
          <div class="thumbnail">
            {{ the_post_thumbnail('large') }}
          </div>

          @php $contact = get_field('contact') @endphp
          @if($contact)
            <div class="contact">
              <h3>Contact</h3>
              {!! $contact !!}
            </div>
          @endif

        </div>
      </div>
    </div>
</article>
