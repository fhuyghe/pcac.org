{{-- TOP --}}
<section id="top">
    <div class="row">
        <div class="col-md-6" id="mission">
            <h1>{!! $data['top_banner']['mission_statement'] !!}</h1>
        </div>
        <div class="col-md-6" id="illustration">
            @php $topImage = $data['top_banner']['illustration'] @endphp
            @if($topImage)
                <img src="{{ $topImage['url'] }}" alt="{{ $topImage['alt'] }}" />
            @endif
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
                @include('partials.council-block')
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
    <div class="row">
        <div class="col-md-4">
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
                    'scroll' => 'false'
                );	
                if(function_exists('alm_render')){
                    alm_render($args);
                }
                @endphp
            </div>
        </div>
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
                    <a class="button" href="/calendar">Calendar</a>
                </div>
            </div>
        </header>
    <div class="row">
        <div class="col-md-4">
            @include('partials/post-block')
        </div>
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
        <div class="col-md-4">
            @include('partials/report-block')
        </div>
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
        <div class="row">
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
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
