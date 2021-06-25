<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageAbout extends Controller
{

    public function data() {
        $data = [];

        $data['councils'] = get_field('councils');
        $data['mission'] = get_field('mission');

        return $data;
    }

    public function staff(){
        $args = array(
            'post_type' => 'people',
	    	'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'council',
                    'field'    => 'slug',
                    'terms'    => 'pcac',
                ),
            ),
	    );

	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }

    function child_pages() { 
 
        global $post; 
         
        if ( is_page() && $post->post_parent )
            $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
        else
            $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
         
        if ( $childpages ) {
            $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
        }
         
        return $string;
         
    }
}
