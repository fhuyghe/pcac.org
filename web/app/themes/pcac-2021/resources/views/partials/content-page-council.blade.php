@php global $post @endphp

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ the_title() }}</h1>
            </div>
            <div class="col-md-6">
                {{ the_post_thumbnail('medium') }}
            </div>
        </div>
    </div>
</section>

<section id="history">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @php the_content() @endphp
            </div>
                <div class="col-md-2">
                    <h4>Reports</h4>
                </div>
                <div class="col-md-2">
                    <h4>Contact</h4>
                    {{ $data['contact']}}
                    <h4>More Info</h4>
                    {{ $data['more_info']}}
                </div>
        </div>
    </div>
</section>


{{-- COMMENTARY --}}
<section id="commentary">
    <div class="container">
        <header>
        <h2>Latest Commentary</h2>
        <div>
            <a class="button" href="/commentary">Read All</a>
        </div>
        </header>
        <div class="row">
            @foreach ($posts as $post)
                @php setup_postdata($post) @endphp
                    @include('partials/post-block')
                @php wp_reset_postdata() @endphp
            @endforeach
        </div>
    </div>
</section>

{{-- MEMBERS --}}
@if($data['members'])
<section id="members">
    <div class="container">
        <header>
        <h2>{{ the_title() }} Members</h2>
        <div class="apply">
            {!! $data['apply_text'] !!}
        </div>
        </header>
        <div class="row">
            @foreach ($data['members'] as $member)
                @include('partials/member-block')
            @endforeach
        </div>
    </div>
</section>
@endif
