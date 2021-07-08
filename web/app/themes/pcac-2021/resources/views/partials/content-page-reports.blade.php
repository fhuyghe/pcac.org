<section id="reports">
    @php
        $args = array(
            'id' => 'ajax_load_more',
            'post_type' => 'reports',
            'posts_per_page' => '6',
            'button_label' => 'More Reports',
            'button_loading_label' => 'Loading...',
            'placeholder' => 'true',
            'theme_repeater' => 'repeater-report-block.php',
            'scroll' => 'false'
        );	
        if(function_exists('alm_render')){
            alm_render($args);
        }
        @endphp
</section>

