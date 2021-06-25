<div class="page-header">
  @if($post->post_parent)
  <div class="parent-banner {{ get_post_field( 'post_name', $post->post_parent) }}">
    <a href="{{ get_the_permalink($post->post_parent) }}" class="council-logo">
    {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
    {{ get_the_title($post->post_parent) }}
    </a>
  </div>
  @endif
  <h1>{!! App::title() !!}</h1>
</div>
