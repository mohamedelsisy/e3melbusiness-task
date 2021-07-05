<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {

        if ($request->ajax()){
            $data  = Course::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data){
                    $button = '<a  href="'. route("admin.courses.edit", $data->id) .'" class="btn btn-success  ml-1 mb-1 "> Edit </a>';
                    $button .= '<a  href="'. route("admin.courses.destroy", $data->id) .'" class="btn btn-danger  ml-1 mb-1"> Delete </a>';
                    return $button;
                })
                ->addColumn('status', function ($data){
                    if ($data->active == 1){
                        return '<span class="text-success">Active</span>';
                    }else{
                        return '<span class="text-warning">Not Active</span>';
                    }
                })

                ->addColumn('category', function ($data){
                    return $data->category->name;
                })
                ->rawColumns(['action', 'status', 'category'])->make(true);
        }
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->get();
        return  view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        try {
            Course::create([
                'name'          => $request->name,
                'active'        => $request->active,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'rating'        => $request->rating,
                'hours'         => $request->hours,
                'views'         => $request->views,
            ]);
            toastr()->success('Course Created Successfully');
            return redirect()->back();
        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.courses');

        }

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
        try {
            $course = Course::find($id);
            if (!$course){
                toastr()->error('This Course Not Founded');
                return redirect()->back();
            }
            $categories = Category::active()->get();

            return view('admin.courses.edit',compact('course', 'categories'));
        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.courses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request)
    {
        try {
            $course = Course::find($request->id);
            if (!$course){
                toastr()->error('This Course Not Founded');
                return redirect()->back();
            }

            Course::where('id', $request->id)->update([
                'name'          => $request->name,
                'active'        => $request->active,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'rating'        => $request->rating,
                'hours'         => $request->hours,
                'views'         => $request->views,
            ]);
            toastr()->success('Course Updated Successfully');

            return redirect()->route('admin.courses');

        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.courses');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $course = Course::find($id);
            if (!$course){
                toastr()->error('This Course Not Founded');
                return redirect()->back();
            }

            $course->delete();
            toastr()->success('Course Deleted Successfully');
            return redirect()->route('admin.courses');

        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.courses');
        }

    }
}
