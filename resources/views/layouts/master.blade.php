<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!--<script src="/js/app.js"></script>-->
	<title>ITL</title>
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="{{ url('/') }}">ITL SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    	<ul class="navbar-nav mr-auto">
	@if (Auth::check())
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			{{__('navbar.courses')}}
        	</a>
        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          		<a class="dropdown-item" href="#">{{__('navbar.student_lists')}}</a>
          		<a class="dropdown-item" href="{{url('/manageSubject') }}">{{__('navbar.subjects_and_managecourse')}}</a>
          <!--
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
          -->
        	</div>
      		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{__('navbar.questionnaires')}}
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropDown">
				<a class="dropdown-item" href="#">{{__('navbar.lookup_questionnaires')}}</a>
				<a class="dropdown-item" href="#">{{__('navbar.manage_questionnaires')}}</a>
				<a class="dropdown-item" href="#">{{__('navbar.control_quzzies')}}</a>
				<a class="dropdown-item" href="#">{{__('navbar.quzzies_status')}}</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{__('navbar.mail_service')}}
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropDown">
				<a class="dropdown-item" href="#">{{__('navbar.mail_reservation')}}</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{__('navbar.results')}}
			</a>
		</li>
		<li class="nav-item dropdown">
                	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        	{{__('navbar.setting_and_help')}}
                	</a>
                	<div class="dropdown-menu" aria-labelledby="navbarDropDown">
                        	<a class="dropdown-item" href="{{ url('profile') }}">{{__('navbar.profile_setting')}}</a>
				<a class="dropdown-item" href="{{ url('teacher_ta_setting')}}">{{__('navbar.teacher_and_researcher_setting')}}</a>
                	</div>
		</li>
		<!--
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{__('language')}}
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropDown">
				<a class="dropdown-item" href="{{ url('/lang/tw') }}">中文</a>
			</div>
		</li>
		-->
	@endif
    	</ul>
	
	<ul class="navbar-nav navbar-right nav_list">
		@if (Auth::guest())
			<li><a class="nav-link" href="{{ url('/login')}}" role="button" aria-pressed="true">{{__('navbar.login')}}</a></li>
			<li><a class="nav-link" href="{{ url('/register')}}" role="button" aria-pressed="true">{{__('navbar.register')}}</a></li>
		@else
                        <li><a class="nav-link" href="{{ url('profile')}}" role="button">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
			</li>
			<li><a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('navbar.logout') }}
                        	</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
				</form>
			</li>
		@endif
			<li><a class="nav-link" href="#" role="button"> {{App::getLocale()}}</a></li>
	</ul>
  </div>
</nav>
<div style="padding-top:65px">
	@yield('content')
</div>
</body>
</html>
