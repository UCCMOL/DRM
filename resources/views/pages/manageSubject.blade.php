@extends('layouts.master')
@section('content')
<div class="container">
	{!! Form::open( ['url' => 'manageSubject' ] ) !!}
	<div class="row">
		<div class="col">
			<select class="form-control" id="newteacheraccount" name="newteacheraccount" required>
				<option value="" disabled selected>{{__('manageSubject.defaultteacheroption')}}</option>
			</select>
		</div>
		<div class="col">
			<input type="text" id="newcoursename" name="newcoursename" class="form-control" placeholder="{{__('manageSubject.newcourseplaceholder')}}">
		</div>
		<div class="col-">
			<button class="btn btn-primary" type="submit">{{__('manageSubject.submitnewcourse')}}</button>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
