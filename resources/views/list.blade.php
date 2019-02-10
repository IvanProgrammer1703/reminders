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
				name="name" value="{{ old('name') }}" placeholder="Введите имя карточки" required autofocus autocomplete="off">
				<br>
				@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
				<button type="submit" class="btn btn-dark col-md-2"><b>+</b></button>
			</form>
			@foreach($lists as $list)
			<br>
				<div class = "card bg-dark">
					<br>
						<h2 class = "card-text text-light">{{$list->name}}</h2>
						<form name="CreateLsit" action="{{asset('/mylist')}}" method="POST">
							@csrf
							<input id="name" type="text" class="form-control col-md-4"
							name="name_card"  placeholder="Введите имя пункта" required autofocus autocomplete="off">
							<br>
							@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
							<button type="submit" class="btn btn-light col-md-1"><b>+</b></button>
							<br>
							<br>
						</form>
						<form class="form" name = "delete_block" action="{{asset('/mylist')}}" method="POST">
							@csrf
						<button type="submit" class="btn btn-light col-md-1" name = "delete"><img class = "img-thumbnail" src="https://clck.ru/FBPzK"></button>
						</form>
				</div>
			@endforeach
			@if(count($lists) == 0)
		</div>
		<div class="card-footer text-muted">
			<p class = "p"> пока нет ни одной карточки</p>
		</div>
		@endif
	</div>
</div>
@endsection
