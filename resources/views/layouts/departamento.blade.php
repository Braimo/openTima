<!DOCTYPE html>
<html>
		<head>
			@include('partials._logedinuserheader')
		</head>
		<body>
			<div class="row">
				@include('partials.admin._horizontalnav')
			</div>
			<div class="row" style="padding-top:60px;">
				@include('partials._messages')
			</div>
			<div class="ui grid"style="padding-top: 50px">
			  <div class="four wide column">
						@yield('side_nav')
				</div>
			  <div class="eleven wide column" style="padding-top: 30px">
						@yield('content')
				</div>
      </div>
		</body>
</html>
<script type="text/javascript">
$('.ui.dropdown').dropdown('hide');
</script>
