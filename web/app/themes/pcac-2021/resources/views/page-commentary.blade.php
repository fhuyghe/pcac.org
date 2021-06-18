@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
      @include('partials.content-page-commentary')
    </div>
  @endwhile
@endsection
