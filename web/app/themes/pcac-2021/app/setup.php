<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'councils' => __('Councils Menu', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

// Change excerpt length
add_filter( 'excerpt_length', function($length) {
    return 20;
} );

//---Reports ::: reports ::: Report ::: report  --//
function create_post_type_reports() {
    register_post_type( 'reports',
        array(
            'labels' => array(
                'name' => __( 'Reports' ),
                'singular_name' => __( 'Report' ),
                'singular_label' => __( 'Report' ),
                'all_items' => __('Reports'),
                'add_new_item' => __('Add new Report'),
                'edit_item' => __('Edit Report')
            ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'query_var' => true,
        'menu_position' => 2,
        'menu_icon' => 'dashicons-clipboard',
        'rewrite' => array('slug' => 'report'),
        'supports' => array('title','editor','thumbnail', 'excerpt')
        )
    );
}
add_action( 'init', __NAMESPACE__ . '\\create_post_type_reports' );
register_taxonomy("reports_type", array("reports"), array("hierarchical" => true, "label" => "Reports Type", "singular_label" => "Reports Type",'query_var' => true, "rewrite" => true));


function custom_taxonomy_blog_category() {
    $labels = array(
        'name' => 'Blog Categories',
        'singular_name' => 'Category',
        'menu_name' => 'Blog Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'new_item_name' => 'New Category Name',
        'add_new_item' => 'Add New Category',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'separate_items_with_commas' => 'Separate Categories with commas',
        'search_items' => 'Search Categories',
        'add_or_remove_items' => 'Add or remove Category',
        'choose_from_most_used' => 'Choose from the most used Categories',
        'not_found' => 'Not Found',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => 'blog_category',
        'rewrite'           => array( 'slug' => 'blog/category' ),
    );
    register_taxonomy('blog_category', array('post'), $args);
}
// Hook into the 'init' action
add_action('init', __NAMESPACE__ . '\\custom_taxonomy_blog_category', 0);


function custom_taxonomy_councils() {
    $labels = array(
        'name' => 'Councils',
        'singular_name' => 'Council',
        'menu_name' => 'Councils'
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => 'council',
    );
    register_taxonomy('council', array('post', 'reports', 'council_statements'), $args);
}
// Hook into the 'init' action
add_action('init', __NAMESPACE__ . '\\custom_taxonomy_councils', 0);
