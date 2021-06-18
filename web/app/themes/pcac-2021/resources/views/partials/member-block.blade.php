<div class="member-block col-md-4">
    <div class="portrait">
        <img src="{{ $member['photo']['sizes']['medium'] }}" />
    </div>
    <div class="name">
        <h3>{{ $member['name'] }}</h3>
        <h6 class="themed">{{ $member['title'] }}</h6>
    </div>
    <div class="info">
        <p>Appointed: {{ $member['appointed'] }}</p>
        <p>Recommended by: {{ $member['recommended_by'] }}</p>
    </div>
</div>