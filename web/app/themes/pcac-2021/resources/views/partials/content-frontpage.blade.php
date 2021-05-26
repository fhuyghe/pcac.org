{{-- TOP --}}
<section id="top">
    <div class="row">
        <div class="col-md-6">
            @php the_content() @endphp
        </div>
        <div class="col-md-6">
            Image
        </div>
    </div>
</section>

{{-- Councils --}}
<section id="councils">
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            council
        </div>
        <div class="col-md-4">
            Image
        </div>
        <div class="col-md-4">
            council
        </div>
    </div>
    </div>
</section>

{{-- Commentary --}}
<section id="commentary">
    <div class="container">
        <header>
            <h2>Commentary</h2>
        </header>
    <div class="row">
        <div class="col-md-4">
            @include('partials/post-block')
        </div>
    </div>
    </div>
</section>

{{-- Calendar --}}
<section id="calendar">
    <div class="container">
        <header>
            <div class="row">
                <div class="col-md-6">
                    <h2>Upcoming Events</h2>
                </div>
                <div class="col-md-6">
                    Text
                    <a class="button" href="/calendar">Calendar</a>
                </div>
            </div>
        </header>
    <div class="row">
        <div class="col-md-4">
            @include('partials/post-block')
        </div>
    </div>
    </div>
</section>

{{-- Commentary --}}
<section id="reports">
    <div class="container">
        <header>
            <h2>Reports</h2>
        </header>
    <div class="row">
        <div class="col-md-4">
            @include('partials/report-block')
        </div>
    </div>
    </div>
</section>

{{-- Feature --}}
<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Feature Title</h2>
            </div>
            <div class="col-md-6">
                <p>Text</p>
                <a class="button">Explore</a>
            </div>
        </div>
        <div class="thumbnail">
            Image
        </div>
    </div>
</section>

{{-- Twitter --}}
<section id="twitter">
    <div class="container">
        <h2>Twitter Feed</h2>
        <div class="row">
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
            <div class="col-md-4">
                <p>Tweet</p>
            </div>
        </div>
    </div>
</section>

{{-- Newsletter --}}
<section id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Join the conversation</h2>
            </div>
            <div class="col-md-6">
                <p>Text</p>
                <a class="button">Facebook</a>
                <a class="button">Twitter</a>
            </div>
        </div>
    </div>
</section>
