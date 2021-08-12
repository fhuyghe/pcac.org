@php
$council_term = wp_get_post_terms(get_the_ID(), 'council');

if($council_term && $council_term[0]){
   $council = $council_term[0]->slug;
} else {
    $council = 'about';
}

$council = $council == 'pcac' ? 'about' : $council;
    
@endphp

<article @php post_class() @endphp>
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="/{{ $council }}"><i class="fal fa-arrow-left"></i> Back to All</a>
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
