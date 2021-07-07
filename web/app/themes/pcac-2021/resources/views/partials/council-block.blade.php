<div class="council-block {{ $post->post_name }}">
    <div class="council-logo">
        {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
        {{ $post->post_name }}
    </div>
    <div class="description">
        {!! the_field('short_description', $post->ID) !!}
    </div>
    <div class="link">
        <a class="button" href="{{ the_permalink() }}">Learn More</a>
    </div>
    <div class="image">
        {{ the_post_thumbnail('large') }}
    </div>
</div>