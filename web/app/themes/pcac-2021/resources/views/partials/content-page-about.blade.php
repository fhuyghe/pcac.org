<section id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ the_title() }}</h1>
            </div>
            <div class="col-md-6">
                {{ the_excerpt() }}
            </div>
        </div>
    </div>
</section>

<section id="reports">
    <div class="container">
    @php the_content() @endphp
    </div>
</section>

