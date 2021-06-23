<?php 
// auth parameters
$api_key = urlencode('C6i86M5zda9yHaYrsE9oBNINF'); // Consumer Key (API Key)
$api_secret = urlencode('oyIpQJu34FoKqPvIrUZepYssoLsBIFoaCMHaDabWp246UbnrES'); // Consumer Secret (API Secret)
$auth_url = 'https://api.twitter.com/oauth2/token'; 

// what we want?
$data_username = 'pcacRiders'; // username
$data_count = 50; // number of tweets
$data_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?tweet_mode=extended';

// get api access token
$api_credentials = base64_encode($api_key.':'.$api_secret);

$auth_headers = 'Authorization: Basic '.$api_credentials."\r\n".
                'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'."\r\n";

$auth_context = stream_context_create(
    array(
        'http' => array(
            'header' => $auth_headers,
            'method' => 'POST',
            'content'=> http_build_query(array('grant_type' => 'client_credentials', )),
        )
    )
);

$auth_response = json_decode(file_get_contents($auth_url, 0, $auth_context), true);
$auth_token = $auth_response['access_token'];

// get tweets
$data_context = stream_context_create( array( 'http' => array( 'header' => 'Authorization: Bearer '.$auth_token."\r\n", ) ) );

$data = json_decode(file_get_contents($data_url.'&include_rts=false&count='.$data_count.'&screen_name='.urlencode($data_username), 0, $data_context), true);
?>

@for ($i = 0; $i < 3; $i++)
    @php $tweet = $data[$i] @endphp
    <div class="tweet">
        <div class="icon">
            <i class="fab fa-twitter"></i>
        </div>
        <div class="tweet-content">
            @php 
                $tweetText = $tweet['full_text'];

                // Link URLs
                $tweetText = App\turnUrlIntoHyperlink($tweetText);

                // Link Twitter handles
                $regex   = '/(^|[^@\w])@(\w{1,15})\b/';
                $replacement = '$1<a target="_blank" href="http://twitter.com/$2">@$2</a>';
                $tweetText = preg_replace($regex, $replacement, $tweetText);
            @endphp
            <div class="tweet-text">
                {!! $tweetText !!}
            </div>
            <div class="date">
                <a href="https://twitter.com/{{ $data_username }}/status/{{ $tweet['id'] }}" target="_blank">
                    {!! date('F j g:i a', strtotime($tweet['created_at'])) !!}
                </a>
            </div>
        </div>
    </div>
@endfor