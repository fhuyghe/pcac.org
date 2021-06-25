<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageAbout extends Controller
{

    public function data() {
        $data = [];

        $data['councils'] = get_field('councils');

        return $data;
    }

    public function staff(){
        $args = array(
            'post_type' => 'people',
	    	'posts_per_page' => -1
	    );

	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
