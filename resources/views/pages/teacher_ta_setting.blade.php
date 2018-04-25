@extends('layouts.master')
@section('content')
<div class="container">
	<nav id="narbar_scroll_spy" class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="#">{{__('teacher_ta_setting.title')}}</a>
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="#teachers">{{__('teacher_ta_setting.teachers')}}</a>
			</li>
			<li class="nav-item">	
				<a class="nav-link" href="#tas">{{__('teacher_ta_setting.tas')}}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#connect">{{__('teacher_ta_setting.connecting')}}</a>
			</li>
		</ul>
	</nav>
	<div data-spy="scroll" data-target="#narbar_scroll_spy" data-offset="0">
		<div id="teachers" class="container-fluid">
		<h4>{{__('teacher_ta_setting.teachers')}}</h4>
			<table class="table table-striped table-fixed">
				<thead class="thead-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">{{__('teacher_ta_setting.teachername')}}</th>
						<th scope="col">{{__('teacher_ta_setting.teacheraccount')}}</th>
						<th scope="col">{{__('teacher_ta_setting.teacherfunction')}}</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				<tfoot>
				{!! Form::open( ['url' =>'teacher_ta_setting_new_teacher']) !!}
					<tr>
						<th scope="rol">*</th>
						<td></td>
						<td><input class="form-control" type="text" id="newteacheraccount" name="newteacheraccount" placeholder="{{__('teacher_ta_setting.newteacheraccountplaceholder')}}"></td>
						<td><button type="submit" class="btn btn-light">{{__('teacher_ta_setting.newteachersubmit')}}</button></td>
					</tr>
				{!! Form::close() !!}
				</tfoot>
			</table>
		</div>
		<div id="tas" class="container-fluid">
		<h4>{{__('teacher_ta_setting.tas')}}</h4>
			<table class="table table-striped table-fixed">
				<thead class="thead-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">{{__('teacher_ta_setting.taname')}}</th>
						<th scope="col">{{__('teacher_ta_setting.taaccount')}}</th>
						<th scope="col">{{__('teacher_ta_setting.tafunction')}}</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
				{!! Form::open( ['url' => 'teacher_ta_setting_new_ta']) !!}
					<tr>
						<th scope="rol">*</th>
						<td></td>
                                                <td><input class="form-control" type="text" id="newtaaccount" name="newtaaccount" placeholder="{{__('teacher_ta_setting.newtaaccountplaceholder')}}"></td>
                                                <td><button type="submit" class="btn btn-light">{{__('teacher_ta_setting.newtasubmit')}}</button></td>
					</tr>
				{!! Form::close() !!}
				</tfoot>
			</table>
		</div>
		<div id="connect" class="container-fluid">
		<h4>{{__('teacher_ta_setting.connecting')}}</h4>
                        <table class="table table-striped table-fixed">
                                <thead class="thead-light">
                                        <tr>
                                                <th scope="col">#</th>
						<th scope="col">{{__('teacher_ta_setting.connectteachername')}}</th>
                                                <th scope="col">{{__('teacher_ta_setting.connectteacheraccount')}}</th>
						<th scope="col">{{__('teacher_ta_setting.connecttaname')}}</th>
                                                <th scope="col">{{__('teacher_ta_setting.connecttaaccount')}}</th>
                                                <th scope="col">{{__('teacher_ta_setting.tafunction')}}</th>
                                        </tr>
				</thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                {!! Form::open( ['url' => 'teacher_ta_setting_new_connect']) !!}
                                        <tr>
                                                <th scope="rol">*</th>
                                                <td></td>
						<td><input class="form-control" type="text" id="newteacheraccount" name="newteacheraccount" placeholder="{{__('teacher_ta_setting.newteacheraccountplaceholder')}}"></td>
						<td></td>
                                                <td><input class="form-control" type="text" id="newtaaccount" name="newtaaccount" placeholder="{{__('teacher_ta_setting.newtaaccountplaceholder')}}"></td>
                                                <td><button type="submit" class="btn btn-light">{{__('teacher_ta_setting.newconnectsubmit')}}</button></td>
                                        </tr>
                                {!! Form::close() !!}
                                </tfoot>
                        </table>
		</div>
	</div>
</div>
@endsection
