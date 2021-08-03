<section id="content">
    <div class="container">
        {!! the_content() !!}
    </div>
</section>

<section id="posts">
    <div class="container">
        @php $parent = get_post_field( 'post_name', $post->post_parent);
            $parent = $parent == 'about' ? 'pcac' : $parent;
        @endphp
    @php
        $args = array(
            'post_type' => 'post',
            'category' => 'meeting-minutes',
            'taxonomy' => 'council',
            'taxonomy_terms' => get_post_field( 'post_name', $post->post_parent),
            'taxonomy_operator' => 'IN',
            'posts_per_page' => '6',
            'button_label' => 'More Meeting Minutes',
            'button_loading_label' => 'Loading...',
            'placeholder' => 'true',
            'theme_repeater' => 'repeater-post-block.php',
            'scroll' => 'true'
        );	
        if(function_exists('alm_render')){
            alm_render($args);
        }
        @endphp
    </div>
</section>