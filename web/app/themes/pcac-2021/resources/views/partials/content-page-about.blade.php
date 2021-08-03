@php global $post @endphp

<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ the_title() }}</h1>
                {!! $data['mission'] !!}
            </div>
        </div>
    </div>
    <div class="thumbnail">
        {{ the_post_thumbnail('large') }}
    </div>
</section>

{{-- Content --}}
<section id="history">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @php the_content() @endphp
            </div>
            <div class="col-md-2 offset-md-2">
                <div class="info">
                    <h4>More Info</h4>
                    {!! $child_pages !!}
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Councils --}}
<section id="councils">
    <div class="container">
        <h2>{{ $data['councils']['title'] }}</h2>
    <div class="row councils">
        @foreach ($data['councils']['councils'] as $council)
            <div class="col-md-4">
                @php $post = $council['council'] @endphp
                @php setup_postdata($post) @endphp
                @include('partials.council-block')
                @php wp_reset_postdata() @endphp
            </div>
        @endforeach
    </div>
    </div>
</section>


{{-- Staff --}}

<section id="staff">
    <div class="container">
        <h2>PCAC Staff</h2>
        <div class="row">
                @foreach ($staff as $post)
                    @php setup_postdata($post) @endphp
                    @include('partials.staff-block')
                    @php wp_reset_postdata() @endphp
                @endforeach
        </div>
    </div>
</section>

