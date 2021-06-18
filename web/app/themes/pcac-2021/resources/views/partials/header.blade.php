<header class="banner">
  <div class="top-banner">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="@asset('images/pcac-logo-500.png')" />
    </a>
  </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <nav class="nav-councils">
      @if( $items = wp_get_nav_menu_items( 'councils' ) )
          @foreach( $items as $item )
            <li class="{{ basename($item->url) }}">
              <h2><a class="themed" href="{{ $item->url }}">{{$item->title}}</a></h2>
              {!! the_field('description', $item->ID) !!}
              <img class="thumbnail" src="{!! get_field('photo', $item->ID)['sizes']['medium'] !!}" />
              <div class="link">
                <a href="{{ $item->url }}" class="themed">Learn More</a>
              </div>
            </li>
          @endforeach
      @endif
    </nav>
</header>
