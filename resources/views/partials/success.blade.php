@if(Session::has('info'))
	<div class="successBox">
		<p>{{ Session::get('info') }}</p>
	</div>
@endif 