<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends AdminController
{

    public function __construct(){
        $this->middleware('can:create_course')->only(['create']);
        $this->middleware('can:delete_course')->only(['destroy']);
        $this->middleware('can:edit_course')->only(['edit','update']);
        $this->middleware('can:show_courses')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::query();
        if($keyword = request('search')){
                $courses-> where('title','like',"%$keyword%")->orWhere('body','like',"%$keyword%")
                ->orWhere('id',$keyword);
        }

        $courses = $courses->latest()->paginate(100);
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CourseRequest $request)
    {
        $imageUrl = $this->uploadImages($request->file('images'));
        auth()->user()->course()->create(array_merge($request->all() , ['images'=>$imageUrl]));  
        return redirect(url('/admin/courses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $file = $request->file('images');

        $inputs = $request->all();
        if ($file){
            $inputs['images'] = $this->uploadImages($request->file('images'));
        }else
        {
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] =$inputs['imageThumb'];
        }

        unset($inputs['imageThumb']);

         
         $course->update($inputs);
        // $teachers = Teacher::all();
//        $teachers->where("user_id",$request->input('user_id'))->update($request->all());

        // alert()->message( 'دوره شما با موفقیت آپدیت شد!')->persistent('بستن');
        return redirect(route('admin.courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course-> delete();

        return redirect(route('admin.courses.index'));
    }
}
