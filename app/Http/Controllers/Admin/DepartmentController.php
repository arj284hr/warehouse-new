<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(12);
        return view('admin.departments.create', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $department = new Department;
            $department->department_name = $request->department_name;
            $department->save();

             return back()->with('message', 'Product Added Successfully!');


             //$departments = Department::paginate(12);
             //return view('admin.departments.create')->with('message', 'Product Added Successfully!')->with('departments', $departments);

           //return back()->with('message', 'Department Added Successfully!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
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
        $department = Department::find($id);
         return view('admin.departments.edit', compact('department'));
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
        try{
            $department = Department::find($id);
            if(empty($department))
            {
                return back()->with('error', 'Product Does Not Exists!');
            }
            if($request->has('department_name'))
            {
                $department->department_name = $request->department_name;
            }

               $department->save();
               //$departments = Department::paginate(12);
              //return view('admin.departments.create')->with('message', 'Product Updated Successfully!')->with('departments', $departments);

            return back()->with('message', 'Product Updated Successfully!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
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
         try{

          Department::find($id)->delete();
          return back()->with('message', 'Product Deleted Successfully!');

      }catch(\Exception $e)
      {

        return back()->with('error', 'There is some trouble to proceed your action!');
     }
  }
}
