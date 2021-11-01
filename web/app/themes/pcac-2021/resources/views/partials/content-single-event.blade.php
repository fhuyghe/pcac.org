<section id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <a href="/events"><i class="fal fa-arrow-left"></i> Back to All</a>
                    </div>
                     <h1>{{ $post->post_title }}</h1>
                     <div class="time">
                        @php $start = strtotime(get_post_meta($post->ID, '_EventStartDate')[0]) @endphp
                        {{ date("F j", $start) }} - {{ date("g:i a", $start) }}
                     </div>

                     @php $links = get_field('links') @endphp
                     @if($links)
                     @foreach ($links as $link)
                         <a class="button" target="_blank" href="{{ $link['link_url'] }}">{{ $link['link_name'] }}</a>
                     @endforeach
                     @endif
                </div>
                <div class="col-md-6">
			        <div class="tribe-events-single-event-description tribe-events-content">
				        <?php the_content(); ?>
			        </div>
                </div>
            </div>
        </div>
    </section>