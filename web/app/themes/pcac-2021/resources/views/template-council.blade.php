{{--
  Template Name: Council Pages
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page-council')
  @endwhile
@endsection
