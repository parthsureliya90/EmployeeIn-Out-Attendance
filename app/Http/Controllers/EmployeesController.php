<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\AttendanceStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeesController extends Controller
{

    public function index()
    {
        $data = Employees::paginate(10);
        return view('emp_list', ["data" => $data]);
    }
    public function create()
    {
        return view('emp_add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phonno' => 'required',
            'salary' => 'required',
            'post' => 'required|in:"ADMIN", "STORE MANAGER", "SALES MANAGER", "PEON", "MARKETING MANAGER"',

        ]);

        // $start_time = date("H:I", strtotime($request->input('start_time')));
        // $end_time = date("H:I", strtotime($request->input('end_time')));

        // $start_time = Carbon::parse($start_time);
        // $end_time = Carbon::parse($end_time);
        // $time_diff = $end_time->diffInHours($start_time);


        $create = new Employees();
        $create->name = $request->input('name');
        $create->email = $request->input('email');
        $create->phonno = $request->input('phonno');
        $create->salary = $request->input('salary');
        $create->post = $request->input('post');
        if ($create->save()) {

            return back()->with('success', 'New Employee Created !');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }


    public function edit($id)
    {
        if (empty($id)) {
            return back()->with('warning', 'Try Again');
        }

        $data = Employees::find($id);
        return view('emp_edit', ["data" => $data]);
    }


    public function update(Request $request, Employees $employees)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $request->input('id'),
            'phonno' => 'required',
            'post' => 'required|in:"ADMIN", "STORE MANAGER", "SALES MANAGER", "PEON", "MARKETING MANAGER"',

        ]);


        $id = $request->input("id");
        $update = Employees::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->phonno = $request->input('phonno');
        $update->post = $request->input('post');
        $update->salary = $request->input('salary');
        if ($update->save()) {
            return back()->with('success', '  Employee Details Updated !');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return back()->with('warning', 'Try Again');
        }

        $destroy = Employees::destroy($id);
        if ($destroy) {
            return back()->with('success', '  Employee Removed !');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
}
