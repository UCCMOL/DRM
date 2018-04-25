<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Connect;
use Auth;
use \stdClass;
use DB;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	return view('pages.homepage');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function manageSubject()
	{
		return view('pages.manageSubject');
	}
	public function newCourse(Request $request)
	{
		$course = Course::create(array('user_id' => Auth::id() , 'name' => $request->new_course_name));
		$course->save();
		return view('pages.manageSubject');
	}
	public function profile()
	{
		$user = Auth::user();
		return view('pages.profile',compact('user'));
	}
	public function profile_update(Request $request)
	{
		$user = Auth::user();
		$user->name = $request->name;
		$user->gender = $request->gender;
		$user->height = $request->height;
		$user->weight = $request->weight;
		$user->birthday = $request->birthday;
		$user->cellphone = $request->cellphone;
		$user->school = $request->school;
		$user->student_id = $request->student_id;
		$user->post_office_account = $request->post_office_account;
		$user->save();
		return view('pages.profile',compact('user'));
	}
	public function teacher_ta_setting()
	{
		$roles = Role::findOrFail(1);
		$teachers = $roles->user()->get();
		if($teachers == null)
		{
			$teachers = array();
		}
		$roles = Role::findOrFail(2);
		$tas = $roles->user()->get();
		if($tas == null)
		{
			$tas = array();
		}
		$connects = Connect::All();
		$connects_result = array();
		foreach ($connects as $c)
		{
			$teacher_user = User::findOrFail($c->teacher_id);
			$ta_user = User::findOrFail($c->ta_id);
			$temp = new stdClass;
			$temp->connect_id = $c->id;
			$temp->teacher = $teacher_user;
			$temp->ta = $ta_user;
			array_push($connects_result,$temp);
		}
		return view('pages.teacher_ta_setting',compact('teachers','tas','connects_result'));
	}
	public function teacher_ta_setting_new_teacher(Request $request)
	{
		$user = User::where('email',$request->newteacheraccount)->first();
		$check = DB::table('user_role_lists')->where('user_id','=',$user->id)
				->where('role_id','=',1)->first();
		if($check != null){
			return redirect('teacher_ta_setting');
		}
		$role = Role::findOrFail(1);
		// role 1 is teacher
		if($user != null && $role != null){
			//$user->roles()->save($role);
			$role->user()->save($user);
		}
		return redirect('teacher_ta_setting');
	}
	public function teacher_ta_setting_new_ta(Request $request)
	{
		// role 2 is researcher
		$user = User::where('email',$request->newtaaccount)->first();
                $check = DB::table('user_role_lists')->where('user_id','=',$user->id)
                                ->where('role_id','=',2)->first();
                if($check != null){
                        return redirect('teacher_ta_setting');
                }
		$role = Role::findOrFail(2);
		if($user != null && $role != null){
			//$user->roles()->save($role);
			$role->user()->save($user);
		}
		return redirect('teacher_ta_setting');
	}
	public function teacher_ta_setting_new_connect(Request $request)
	{
		$connect = Connect::where('teacher_id','=',$request->newteacherconnectid)
				->where('ta_id','=',$request->newtaconnectid)->first();
		if($connect ==null){
			$connect = new Connect;
			$connect->teacher_id = $request->newteacherconnectid;
			$connect->ta_id = $request->newtaconnectid;
			$connect->save();
		}
		return redirect('teacher_ta_setting');
	}
	public function teacher_ta_setting_remove_teacher($teacher_id)
	{
		$user = User::findOrFail($teacher_id);
		$role = Role::findOrFail(1);
		if($user !=null && $role != null)
		{
			$role->user()->detach($user);
		}
		return redirect('teacher_ta_setting');
	}
	public function teacher_ta_setting_remove_ta($ta_id)
	{
                $user = User::findOrFail($ta_id);
                $role = Role::findOrFail(2);
                if($user !=null && $role != null)
                {
                        $role->user()->detach($user);
                }
		return redirect('teacher_ta_setting');
	}
	public function teacher_ta_setting_remove_connect($c_id)
	{
		$connect = Connect::findOrFail($c_id);
		$connect->delete();
		return redirect('teacher_ta_setting');
	}
}
