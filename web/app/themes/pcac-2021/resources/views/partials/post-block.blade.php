@php 
$council_term = wp_get_post_terms(get_the_ID(), 'council');
$category = [];

if($council_term && $council_term[0]){
   $council = $council_term[0]->slug;
} else {
    $council = 'pcac';
}

$term_list = wp_get_post_terms(get_the_ID(), 'category', ['fields' => 'all']);
foreach($term_list as $term) {
   if( get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category',true) == $term->term_id ) {
     $category = $term;
   }
}
if(!$category) {
    $category = $term_list ? $term_list[0] : '';
}
@endphp

<div class="col-md-4">
<div class="post-block {{ $council }} {{ $category->slug }}">
    <div class="top themed">
        <div class="council">
            {{ $council }}
        </div>
        <div class="date">
            {{ the_date() }}
        </div>
    </div>
    <a href="{{ the_permalink() }}">
    <div class="thumbnail">
        @php $thumbnail = get_the_post_thumbnail( null, 'medium' ) @endphp
        @if($thumbnail)
            {!! $thumbnail !!}
        @else
            <div class="council-logo">
                {!! file_get_contents(App\asset_path('images/logo_PCAC.svg')) !!}
                {{ $council }}
            </div>
        @endif
    </div>
    </a>

    @if($category)
    <div class="category themed">
        {{ $category->name }}
    </div>
    @endif

    <h4><a href="{{ the_permalink() }}">{{ the_title() }}</a></h4>
    {{ the_excerpt() }}
</div>
</div>