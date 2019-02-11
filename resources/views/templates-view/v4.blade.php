<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>{{ data_get($data, 'title', 'Under Construction') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">

	<!-- Stylesheets -->
	
	@include('templates-view.partial.common-style')
		
	@include('templates-view.partial.custom-style', ['v' => 'v4'])
	
</head>
<body>
	
	<div class="main-area">
		
		<section class="left-section" style="background-image: url('{{ data_get($data, 'background_url', asset('templates-view/images/countdown-4-1000x1000.jpg')) }}')">
		
			
		</section><!-- left-section -->
		
		
		<section class="right-section full-height">
		
			<a class="logo" href="#"><img src="{{ data_get($data, 'logo_url', asset('templates-view/images/logo-white.png')) }}" alt="Logo"></a>
			
			<div class="display-table">
				<div class="display-table-cell">
					<div class="main-content">
						<h1 class="title"><b>{{ data_get($data, 'title', 'Under Construction') }}</b></h1>
						<p class="desc">{{ data_get($data, 'sub_title', 'Our website is currently undergoing scheduled maintenance. We Should be back shortly. Thank you for your patience.') }}</p>
					</div><!-- main-content -->
				</div><!-- display-table-cell -->
			</div><!-- display-table -->
			
			<ul class="footer-icons">
				<li>Stay in touch : </li>
				<li><a href="{{ data_get($data, 'facebook_url', '#') }}"><i class="ion-social-facebook"></i></a></li>
				<li><a href="{{ data_get($data, 'twitter_url', '#') }}"><i class="ion-social-twitter"></i></a></li>
				<li><a href="{{ data_get($data, 'googleplus_url', '#') }}"><i class="ion-social-googleplus"></i></a></li>
				<li><a href="{{ data_get($data, 'instagram_url', '#') }}"><i class="ion-social-instagram-outline"></i></a></li>
			</ul>
		
		</section><!-- right-section -->
		
	</div><!-- main-area -->
	
	<!-- SCRIPTS -->
	
	@include('templates-view.partial.common-script')
	
</body>
</html>
