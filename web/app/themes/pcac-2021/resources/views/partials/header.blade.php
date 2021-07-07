<header class="banner">
  <div class="top-banner">
    <a class="brand" href="{{ home_url('/') }}">
      <div class="council-logo">
        {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
        {{ get_bloginfo('name') }}
      </div>
    </a>
    <div class="announcement">
      @php $announcement = get_field('announcement', 'option'); @endphp
      @if ($announcement['active'])
          {{ $announcement['text'] }}
          <a href="{{ $announcement['link'] }}" target="_blank">Read More</a>
      @endif
    </div>
    <div class="hamburger-wrap">
      <button class="hamburger hamburger--squeeze" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
      <div class="search-wrap">
        {!! do_shortcode('[ivory-search id="7011" title="Default Search Form"]') !!}
      </div>
      <div class="social">
        @php $socialLinks = get_field('social_links', 'option') @endphp
        @foreach ($socialLinks as $link)
            <a href="{{ $link['link'] }}"><i class="fa-{{ strtolower($link['name']) }} fa-{{ strtolower($link['name']) }}-f fab"></i></a>
        @endforeach
      </div>
      <div class="contact">
        {!! the_field('contact', 'option') !!}
      </div>
    </nav>
    <nav class="nav-councils">
      @if( $items = wp_get_nav_menu_items( 'councils' ) )
          @foreach( $items as $item )
            @php $postID = get_post_meta( $item->ID, '_menu_item_object_id', true ) @endphp
            <li class="{{ basename($item->url) }}">
              <a class="themed" href="{{ $item->url }}">
                <div class="council-logo">
                  {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
                  {{ $item->title }}
              </div>
            </a>
              {!! the_field('short_description', $postID) !!}
              {!! get_the_post_thumbnail($postID, 'medium') !!}
              <div class="link">
                <a href="{{ $item->url }}" class="themed">Learn More</a>
              </div>
            </li>
          @endforeach
      @endif
    </nav>
</header>
