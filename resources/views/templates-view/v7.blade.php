<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>{{ data_get($data, 'title', 'Comming Soon') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">


	@include('templates-view.partial.common-style')

	@include('templates-view.partial.custom-style', ['v' => 'v7'])
	
</head>
<body>
	
	<div class="main-area center-text" style="background-image:url('{{ data_get($data, 'background_url', asset('templates-view/images/countdown-6-1600x900.jpg')) }}');" >
		
		<div class="display-table">
			<div class="display-table-cell">

				<h1 class="title"><b>{{ data_get($data, 'title', 'Comming Soon') }}</b></h1>
				<p class="desc font-white">{{ data_get($data, 'sub_title', 'Our website is currently undergoing scheduled maintenance. We Should be back shortly. Thank you for your patience.') }}</p>

				<div id="normal-countdown" data-date="{{ data_get($data, 'end_time', '2020/01/01') }}"></div>

				<ul class="social-btn">
					<li class="list-heading">Follow us for update</li>
					<li><a href="{{ data_get($data, 'facebook_url', '#') }}"><i class="ion-social-facebook"></i></a></li>
					<li><a href="{{ data_get($data, 'twitter_url', '#') }}"><i class="ion-social-twitter"></i></a></li>
					<li><a href="{{ data_get($data, 'googleplus_url', '#') }}"><i class="ion-social-googleplus"></i></a></li>
					<li><a href="{{ data_get($data, 'instagram_url', '#') }}"><i class="ion-social-instagram-outline"></i></a></li>
				</ul>
				
			</div><!-- display-table -->
		</div><!-- display-table-cell -->
	</div><!-- main-area -->


	<!-- SCRIPTS -->

	@include('templates-view.partial.common-script')
	
</body>
</html>
