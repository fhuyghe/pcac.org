<div class="council-block {{ $post->post_name }}">
    <div class="logo">
        {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
        {{ $post->post_name }}
        {{-- <img src="{{ get_field('logo', $post->ID)['sizes']['medium'] }}" /> --}}
    </div>
    <div class="description">
        {!! the_field('short_description', $post->ID) !!}
        <a class="button" href="{{ the_permalink() }}">Learn More</a>
    </div>
    <div class="image">
        {{ the_post_thumbnail('medium') }}
    </div>
</div>