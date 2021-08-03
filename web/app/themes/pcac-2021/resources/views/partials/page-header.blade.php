<div class="page-header">
  @if($post->post_parent)
    @php $parent = get_post_field( 'post_name', $post->post_parent);
            $parent = $parent == 'about' ? 'pcac' : $parent;
        @endphp
  <div class="parent-banner {{ $parent }}">
    <div class="container">
      <a href="{{ get_the_permalink($post->post_parent) }}" class="council-logo">
      {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
      {{ $parent }}
      </a>
    </div>
  </div>
  @endif

  <div class="container">
    <h1>{!! App::title() !!}</h1>
  </div>
</div>
