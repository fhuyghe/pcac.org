<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{

    public function data() {
        $data = [];

        $data['top_banner'] = get_field('top_banner');
        $data['councils'] = get_field('councils');
        $data['events'] = get_field('events');

        return $data;
    }

    public function events(){
        $args = array(
            'post_type' => 'tribe_events',
	    	'posts_per_page' => 5
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
    
    public function reports(){
        $args = array(
            'post_type' => 'reports',
	    	'posts_per_page' => 3
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
