<tr class="event">
    @php $start = strtotime(get_post_meta($event->ID, '_EventStartDate')[0]) @endphp
    <td class="date">
        {{ date("M j", $start) }}
    </td>
    <td class="time">
        {{ date("g:i a", $start) }}
    </td>
    <td class="subject">
        {{ $event->post_title }}
    </td>
    <td class="link">
    </td>
    <td class="info">
        {!! $event->post_content !!}
        
        @php $links = get_field('links', $event->ID) @endphp
        @if($links)
        @foreach ($links as $link)
            <a class="button" target="_blank" href="{{ $link['link_url'] }}">{{ $link['link_name'] }}</a>
        @endforeach
        @endif
    </td>
</tr>