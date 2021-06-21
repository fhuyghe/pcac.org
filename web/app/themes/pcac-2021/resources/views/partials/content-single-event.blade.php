<section id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <a href="/events"><- Back to All</a>
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

    <section id="links">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @php $previous_post = get_previous_post() @endphp
                    {{ print_r($previous_post) }}
                    @if( is_a( $previous_post , 'WP_Post' ) )
                        <a href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                    @endif
                </div>
                <div class="col-md-6">
                    @php $next_post = get_next_post(TRUE, '', 'post_type') @endphp
                    {{ print_r($next_post) }}
                    @if( is_a( $next_post , 'WP_Post' ) )
                        <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                    @endif
                    {{ next_post_link() }}
                </div>
            </div>
        </div>
    </section>