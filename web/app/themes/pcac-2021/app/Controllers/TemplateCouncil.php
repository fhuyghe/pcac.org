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
        $data['members'] = get_field('members');
        $data['apply_text'] = get_field('apply_text');

        return $data;
    }

    public function posts(){
        global $post;
        
        $args = array(
            'post_type' => 'post',
	    	'posts_per_page' => 3,
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
