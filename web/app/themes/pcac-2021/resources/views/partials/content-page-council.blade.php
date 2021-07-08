@php global $post @endphp

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="council-logo">{!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!} {{ the_title() }}</div>
                <h1>{{ $data['full_name'] }}</h1>
            </div>
        </div>
    </div>
    <div class="thumbnail">
        {{ the_post_thumbnail('large') }}
    </div>
</section>

<section id="history">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @php the_content() @endphp
            </div>
                <div class="col-md-2 offset-md-2">
                    @if($data['contact'])
                    <div class="contact">
                        <h4>Contact</h4>
                        {{ $data['contact'] }}
                    </div>
                    @endif

                    <div class="info">
                        <h4>More Info</h4>
                        {!! $child_pages !!}
                    </div>
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
@if($members)
<section id="members">
    <div class="container">
        <header>
        <h2>{{ the_title() }} Members</h2>
        <div class="apply">
            {!! $data['apply_text'] !!}
        </div>
        </header>
        <div class="row">
            @foreach ($members as $post)
                @php setup_postdata($post) @endphp
                @include('partials/member-block')
                @php wp_reset_postdata() @endphp
            @endforeach
        </div>
    </div>
</section>
@endif
