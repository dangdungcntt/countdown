<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>{{ data_get($data, 'title', 'Comming Soon') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	@include('templates-view.partial.meta', ['data' => $data])

	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">

	<!-- Stylesheets -->

	@include('templates-view.partial.common-style')
		
	@include('templates-view.partial.custom-style', ['v' => 'v3'])
</head>
<body>
	
	<div class="main-area center-text" style="background-image:url('{{ data_get($data, 'background_url', asset('templates-view/images/countdown-3-1600x900.jpg')) }}');">
		
		<div class="display-table">
			<div class="display-table-cell">
				
				<h1 class="title font-white"><b>{{ data_get($data, 'title', 'Comming Soon') }}</b></h1>
				<p class="desc font-white">{{ data_get($data, 'sub_tile', 'Our website is currently undergoing scheduled maintenance. We Should be back shortly. Thank you for your patience.') }}</p>
				
				<ul class="social-btn font-white">
					<li><a href="{{ data_get($data, 'facebook_url', '#') }}">facebook</a></li>
					<li><a href="{{ data_get($data, 'twitter_url', '#') }}">twitter</a></li>
					<li><a href="{{ data_get($data, 'googleplus_url', '#') }}">google</a></li>
					<li><a href="{{ data_get($data, 'instagram_url', '#') }}">instagram</a></li>
				</ul><!-- social-btn -->
				
			</div><!-- display-table -->
		</div><!-- display-table-cell -->
	</div><!-- main-area -->
	
</body>
</html>
