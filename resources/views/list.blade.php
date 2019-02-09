@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card text-center">
		<div class="card-header">
			<h1 class = "h1">Список моих дел</h1>
		</div>
		<div class="card-body">
			<form name="CreateLsit" action="{{asset('/mylist')}}" method="POST">
				@csrf
				<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
				name="name" value="{{ old('name') }}" placeholder="Введите имя карточки" required autofocus>
				<br>
				@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
						</span>
				@endif
				<button type="submit" class="btn btn-dark col-md-2"><b>+</b></button>
			</form>
				<!-- foreach($lists as $lit) не забыть дописать собак
				<h1>wad</h1>
				endforeach -->
		</div>
		<div class="card-footer text-muted">
			<p class = "p"> пока нет ни одной карточки</p>
		</div>
	</div>
</div>
@endsection
