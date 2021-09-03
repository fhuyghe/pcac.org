<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateCouncil extends Controller
{

    public function data() {
        $data = [];

        $data['contact'] = get_field('contact');
        $data['more_info'] = get_field('more_info');
        $data['apply_text'] = get_field('apply_text');
        $data['full_name'] = get_field('full_name');

        return $data;
    }

    public function members(){
        global $post;

        $args = array(
            'post_type' => 'people',
	    	'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'council',
                    'field'    => 'slug',
                    'terms'    => $post->post_name,
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

    public function posts(){
        global $post;
        
        $args = array(
            'post_type' => 'post',
	    	'posts_per_page' => 3,
            'cat' => '-112',
            'tax_query' => array(
                array (
                    'taxonomy' => 'council',
                    'field' => 'slug',
                    'terms' => $post->post_name,
                )
            ),
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
