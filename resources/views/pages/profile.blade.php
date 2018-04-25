@extends('layouts.master')
@section('content')
<div class="container">
{!! Form::open( ['url' => 'profile','class' => 'form-horizontal'] ) !!}
	<div class="form-title"><h2>{{ __('profile.profile_title')}}</h2></div>
	<div class="control-group row">
		<label class="control-label col-sm-2">
			{{__('profile.name')}}
		</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
		</div>
	</div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.gender')}}
                </label>
                <div class="col-sm-10">
                	<label class="btn">
				@if($user->gender == 0)
                        		<input type="radio" id="gender_male" name="gender" value="0" checked>{{__('profile.male')}}
				@else
					<input type="radio" id="gender_male" name="gender" value="0">{{__('profile.male')}}
				@endif
                	</label>
                	<label class="btn">
				@if($user->gender == 1)
                        		<input type="radio" id="gender_female" name="gender" value="1" checked>{{__('profile.female')}}
                        	@else
					<input type="radio" id="gender_female" name="gender" value="1">{{__('profile.female')}}
				@endif
                	</label>
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.height')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="height" name="height" value="{{$user->height}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.weight')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="weight" name="weight" value="{{$user->weight}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.birthday')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="birthday" name="birthday" value="{{$user->birthday}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.cellphone')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{$user->cellphone}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.school')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="school" name="school" value="{{$user->school}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.student_id')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="student_id" name="student_id" value="{{$user->student_id}}">
                </div>
        </div>
        <div class="control-group row">
                <label class="control-label col-sm-2">
                        {{__('profile.post_office_account')}}
                </label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" id="post_office_account" name="post_office_account" value="{{$user->post_office_account}}">
                </div>
        </div>
	<button type="submit" class="btn btn-light">{{__('profile.submit')}}</button>
{!! Form::close() !!}
</div>
@endsection
