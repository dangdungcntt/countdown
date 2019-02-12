<meta property="og:title" content="{{ data_get($data, 'title') }}@if(data_get($data, 'end_time')) ({{ \Illuminate\Support\Carbon::parse(data_get($data, 'end_time'))->diffForHumans(now()) }}) @endif"/>
<meta property="og:description" content="{{ data_get($data, 'sub_title') }}"/>
<meta property="og:image" content="{{ data_get($data, 'background_url', 'https://nddcoder.com/wp-content/uploads/2018/09/logo-blue-600x315.jpg') }}"/>
