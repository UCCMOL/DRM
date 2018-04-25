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
					@php ($n = 1)
					@foreach ($teachers as $teacher)
						<tr>
							<td>{{$n}}</td>
							<td>{{$teacher->name}}</td>
							<td>{{$teacher->email}}</td>
							<td><a href="{{url('remove_teacher/'.$teacher->id.'')}}" class="btn btn-danger" role="button" >{{__('teacher_ta_setting.removeteacher')}}</a></td>
						</tr>
						@php ($n++)
					@endforeach
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
					@php ($n = 1)
					@foreach($tas as $ta)
						<tr>
							<td>{{$n}}</td>
							<td>{{$ta->name}}</td>
							<td>{{$ta->email}}</td>
							<td><a href="{{url('remove_ta/'.$ta->id.'')}}" class="btn btn-danger" role="button" >{{__('teacher_ta_setting.removeta')}}</a></td>
						</tr>
						@php ($n++)
					@endforeach
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
                                                <th scope="col">{{__('teacher_ta_setting.connectfunction')}}</th>
                                        </tr>
				</thead>
                                <tbody>
					@php ($n = 1)
					@foreach ($connects_result as $r)
						<tr>
							<td>{{$n}}</td>
							<td>{{ $r->teacher->name }}</td>
							<td>{{ $r->teacher->email }}</td>
							<td>{{ $r->ta->name }} </td>
							<td>{{ $r->ta->email }}</td>
							<td><a href="{{url('remove_connect/'.$r->connect_id.'')}}" class="btn btn-danger" role="button" >{{__('teacher_ta_setting.removeconnect')}}</a></td>
						</tr>
						@php($n++)
					@endforeach
                                </tbody>
                                <tfoot>
                                {!! Form::open( ['url' => 'teacher_ta_setting_new_connect']) !!}
                                        <tr>
                                                <th scope="rol">*</th>
						<td>
							<select class="form-control" id="newteacherconnect" name="newteacherconnectid" required>
								<option value="" disabled selected>{{__('teacher_ta_setting.newteacherconnectdefaultoption')}}</option>
								@foreach ($teachers as $teacher)
									<option value="{{$teacher->id}}">{{$teacher->name}}</option>
								@endforeach
							</select>
						</td>
						<td></td>
                                                <td>
                                                        <select class="form-control" id="newtaconnect" name="newtaconnectid" required>
                                                                <option value="" disabled selected>{{__('teacher_ta_setting.newtaconnectdefaultoption')}}</option>
                                                                @foreach ($tas as $ta)
                                                                        <option value="{{$ta->id}}">{{$ta->name}}</option>
								@endforeach
                                                        </select>
                                                </td>
						<td></td>
                                                <td><button type="submit" class="btn btn-light">{{__('teacher_ta_setting.newconnectsubmit')}}</button></td>
                                        </tr>
                                {!! Form::close() !!}
                                </tfoot>
                        </table>
		</div>
	</div>
</div>
@endsection
