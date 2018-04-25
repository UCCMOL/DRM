<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
		return view('pages.teacher_ta_setting');
	}
}
