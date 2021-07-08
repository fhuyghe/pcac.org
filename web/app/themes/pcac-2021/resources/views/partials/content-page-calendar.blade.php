@php global $post @endphp

{{-- Calendar --}}
<section id="calendar">
    <div class="container">
        <header>
            <h2>Upcoming Events</h2>
        </header>
    <div class="event-list">
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Subject</th>
                <th></th>
            </tr>
        @if($events)
        @foreach ($events as $event)
            @include('partials.event-row')
        @endforeach
        @endif
        </table>
    </div>
    </div>
</section>