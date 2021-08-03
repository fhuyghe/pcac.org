<section id="top">
    <div class="row">
        <div class="col-md-6 title">
            <h1>{!! App::title() !!}</h1>
            <div>
            <a class="button" id="filterToggle" href="#">Filter</a>
            </div>
        </div>
        <div class="col-md-6" id="filters">
            {!! do_shortcode('[ajax_load_more_filters id="commentary_filter" target="alm_commentary_filter"]') !!}
        </div>
    </div>
</section>

<section id="posts">
    @php
        $args = array(
            'id' => 'alm_commentary_filter',
            'filters' => 'true',
            'target' => 'commentary_filter',
            'post_type' => 'post',
            'posts_per_page' => '6',
            'button_label' => 'More Posts',
            'button_loading_label' => 'Loading...',
            'placeholder' => 'true',
            'theme_repeater' => 'repeater-post-block.php',
            'scroll' => 'true'
        );	
        if(function_exists('alm_render')){
            alm_render($args);
        }
        @endphp
</section>

