@php global $post @endphp

@php 
    function formatTitle($title){
        return preg_replace('/\*(.*?)\*/', '<span>$1</span>', $title);
    }
@endphp

{{-- TOP --}}
<section id="top">
    <div class="row">
        <div class="col-md-6" id="mission">
            <h1>{!! formatTitle($data['top_banner']['mission_statement']) !!}</h1>
            <a class="button" href="/about">Learn More</a>
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
            <div class="filter">
                <div class="desktop">
                {!! do_shortcode('[ajax_load_more_filters id="categories" target="ajax_load_more"]') !!}
                </div>
                <div class="mobile">
                    @php $categories = get_categories( array('orderby' => 'name') ) @endphp
                    <select>
                        <option value="">Categories</option>
                    @foreach ( $categories as $category )
                        @if(!in_array($category->slug, ['uncategorized', 'meeting-minutes', 'letter']) )
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="button">
                <a class="button" href="/commentary">Read All</a>
            </div>
        </header>
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
                <div class="col-md-6 col-lg-8">
                    <h2>{{ $data['events']['title'] }}</h2>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="description">
                        {{ $data['events']['description'] }}
                    </div>
                    <a class="button" href="/events">Calendar</a>
                </div>
            </div>
        </header>
    <div class="event-list">
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Subject</th>
                <th></th>
            </tr>
        @foreach ($events as $event)
            @include('partials.event-row')
        @endforeach
        </table>
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
    @php 
        $post = $data['feature']['item'];
        setup_postdata($post); 
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ the_title() }}</h2>
            </div>
            <div class="col-md-6">
                {!! the_excerpt() !!}
                <a class="button" href="{{ the_permalink() }}">Explore</a>
            </div>
        </div>
        <div class="thumbnail">
            <img src="{{ $data['feature']['image']['sizes']['large'] }}" />
        </div>
    </div>
    @php wp_reset_postdata() @endphp
</section>

{{-- Twitter --}}
<section id="twitter">
    <div class="container">
        <h2>Twitter Feed</h2>
        <div class="row" id="twitterFeed">
            @include('partials.latest-tweets')
        </div>
    </div>
</section>

{{-- Newsletter --}}
<section id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $data['social']['title'] }}</h2>
            </div>
            <div class="col-md-6">
                <p>{{ $data['social']['text'] }}</p>
                @foreach ( $data['social']['links'] as $link)
                <div class="link">
                    <a class="button" href="{{ $link['url'] }}" target="_blank">{{ $link['text'] }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
