<!DOCTYPE html>
<html lang="en">
	@include('user.includes.head')
	<body>
		@include('user.includes.header')

		@include('user.includes.navigation')

		{{-- @include('user.includes.breadcrumb') --}}

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@yield('content')
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		@include('user.includes.newsletter')

		@include('user.includes.footer')

		@include('user.includes.script')

	</body>
</html>
