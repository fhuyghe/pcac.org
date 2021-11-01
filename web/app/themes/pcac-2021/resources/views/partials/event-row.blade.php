<tr class="event">
    @php $start = strtotime(get_post_meta(get_the_ID(), '_EventStartDate')[0]) @endphp
    <td class="date">
        {{ date("M j", $start) }}
    </td>
    <td class="time">
        {{ date("g:i a", $start) }}
    </td>
    <td class="subject">
        {{ the_title() }}
    </td>
    <td class="link">
    </td>
    <td class="info">
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
    </td>
</tr>