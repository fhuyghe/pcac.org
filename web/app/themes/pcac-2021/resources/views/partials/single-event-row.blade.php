<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * @version 4.6.19
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
@php global $post @endphp
@php $start = strtotime(get_post_meta(get_the_ID(), '_EventStartDate')[0]) @endphp

<!-- Event Title -->
<div class="date">
        {{ date("M j", $start) }}
</div>
    <div class="time">
        {{ date("g:i a", $start) }}
    </div>
    <div class="subject">
        {{ the_title() }}
    </div>
    <div class="link">
    </div>
    <div class="info">
        <div class="row">
            <div class="col-md-10">
                {!! the_content() !!}
            </div>
            <div class="col-md-2">
                @php $links = get_field('links', get_the_ID()) @endphp
                @if($links)
                @foreach ($links as $link)
                <a class="button" target="_blank" href="{{ $link['link_url'] }}">{{ $link['link_name'] }}</a>
                @endforeach
                @endif
            </div>
        </div>
    </div>