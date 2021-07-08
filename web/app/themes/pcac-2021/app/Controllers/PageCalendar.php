<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageCalendar extends Controller
{

    public function events(){
        $args = array(
            'post_type' => 'tribe_events',
	    	'posts_per_page' => 20
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
