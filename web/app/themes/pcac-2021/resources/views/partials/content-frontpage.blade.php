@php global $post @endphp

{{-- TOP --}}
<section id="top">
    <div class="row">
        <div class="col-md-6" id="mission">
            <h1>{!! $data['top_banner']['mission_statement'] !!}</h1>
        </div>
        @php $topImage = $data['top_banner']['illustration'] @endphp
        <div class="col-md-6" id="illustration" style="background-image: url({{ $topImage['sizes']['large'] }})">
        </div>
    </div>
</section>

{{-- Councils --}}
<section id="councils">
    <div class="container">
        <h2>{{ $data['councils']['title'] }}</h2>
    <div class="row">
        @foreach ($data['councils']['councils'] as $council)
            <div class="col-md-4">
                @php $post = $council['council'] @endphp
                @php setup_postdata($post) @endphp
                @include('partials.council-block')
                @php wp_reset_postdata() @endphp
            </div>
        @endforeach
    </div>
    </div>
</section>

{{-- Commentary --}}
<section id="commentary">
    <div class="container">
        <header>
            <h2>Commentary</h2>
        </header>
        {!! do_shortcode('[ajax_load_more_filters id="categories" target="ajax_load_more"]') !!}
            <div class="load-more">
                @php
                $args = array(
                    'id' => 'ajax_load_more',
                    'filters' => "true",
                    'target' => "categories",
                    'post_type' => 'post',
                    'posts_per_page' => '3',
                    'button_label' => 'Show More Posts',
                    'button_loading_label' => 'Loading...',
                    'placeholder' => 'false',
                    'theme_repeater' => 'repeater-post-block.php',
                    'scroll' => 'false'
                );	
                if(function_exists('alm_render')){
                    alm_render($args);
                }
                @endphp
        </div>
    </div>
</section>

{{-- Calendar --}}
<section id="calendar">
    <div class="container">
        <header>
            <div class="row">
                <div class="col-md-6">
                    <h2>Upcoming Events</h2>
                </div>
                <div class="col-md-6">
                    Text
                    <a class="button" href="/events">Calendar</a>
                </div>
            </div>
        </header>
    <div class="events">
        @foreach ($events as $event)
        <div class="event">
            @php $start = strtotime(get_post_meta($event->ID, '_EventStartDate')[0]) @endphp
            <div class="date">
                {{ date("F j", $start) }}
            </div>
            <div class="time">
                {{ date("g:i a", $start) }}
            </div>
            <div class="subject">
                {{ $event->post_title }}
            </div>
            <div class="link">
                <a href="{{ the_permalink($event->ID) }}">Learn More</a>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>

{{-- Commentary --}}
<section id="reports">
    <div class="container">
        <header>
            <h2>Reports</h2>
        </header>
    <div class="row">
        @foreach ($reports as $post)
            @php setup_postdata($post) @endphp
                @include('partials/report-block')
            @php wp_reset_postdata() @endphp
        @endforeach
    </div>
    </div>
</section>

{{-- Feature --}}
<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Feature Title</h2>
            </div>
            <div class="col-md-6">
                <p>Text</p>
                <a class="button">Explore</a>
            </div>
        </div>
        <div class="thumbnail">
            Image
        </div>
    </div>
</section>

{{-- Twitter --}}
<section id="twitter">
    <div class="container">
        <h2>Twitter Feed</h2>
        <div class="row" id="twitterFeed">
            @include('partials.latest-tweets')
            {{-- <a class="twitter-timeline" 
            data-tweet-limit="3"
            data-chrome="noheader nofooter noborders noscrollbar transparent"
            href="https://twitter.com/PCACriders?ref_src=twsrc%5Etfw">Tweets by PCACriders</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> --}}
        </div>
    </div>
</section>

{{-- Newsletter --}}
<section id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Join the conversation</h2>
            </div>
            <div class="col-md-6">
                <p>Text</p>
                <a class="button">Facebook</a>
                <a class="button">Twitter</a>
            </div>
        </div>
    </div>
</section>
