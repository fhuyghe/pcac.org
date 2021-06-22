<div class="staff-block col-md-4 pcac">
    <div class="portrait">
        {!! the_post_thumbnail('medium') !!}
    </div>
    <div class="info">
        <h3>{{ the_title() }}</h3>
        <h6 class="themed">{{ the_field('title') }}</h6>
        <a class="button" href="{{ the_permalink() }}">Read More</a>
    </div>
</div>