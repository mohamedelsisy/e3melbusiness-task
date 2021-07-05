<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {

        if ($request->ajax()){
            $data  = Category::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data){
                    $button = '<a  href="'. route("admin.categories.edit", $data->id) .'" class="btn btn-success  ml-1 mb-1 "> Edit </a>';
                    $button .= '<a  href="'. route("admin.categories.destroy", $data->id) .'" class="btn btn-danger  ml-1 mb-1"> Delete </a>';
                    return $button;
                })
                ->addColumn('status', function ($data){
                    if ($data->active == 1){
                        return '<span class="text-success">Active</span>';
                    }else{
                        return '<span class="text-warning">Not Active</span>';
                    }
                })
                ->rawColumns(['action', 'status'])->make(true);
        }
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create([
                'name'   => $request->name,
                'active' => $request->active,
            ]);
            toastr()->success('Category Created Successfully');
            return redirect()->back();
        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.categories');

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
            $category = Category::find($id);
            if (!$category){
                toastr()->error('This Category Not Founded');
                return redirect()->back();
            }
            return view('admin.categories.edit',compact('category'));
        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.categories');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        try {
            $category = Category::find($request->id);
            if (!$category){
                toastr()->error('This Category Not Founded');
                return redirect()->back();
            }

            Category::where('id', $request->id)->update([
               'name'       =>$request->name,
               'active'     =>$request->active,
            ]);
            toastr()->success('Category Updated Successfully');

            return redirect()->route('admin.categories');

        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.categories');
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
            $category = Category::find($id);
            if (!$category){
                toastr()->error('This Category Not Founded');
                return redirect()->back();
            }

            $category->delete();
            toastr()->success('Category Deleted Successfully');
            return redirect()->route('admin.categories');

        }catch (Exception $exception){
            toastr()->error('There is an Error');
            return redirect()->route('admin.categories');
        }

    }
}
