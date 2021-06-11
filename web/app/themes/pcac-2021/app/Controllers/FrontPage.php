<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    public function data() {
        $data = [];

        $data['top_banner'] = get_field('top_banner');
        $data['councils'] = get_field('councils');
        $data['events'] = get_field('events');

        return $data;
    }
}
