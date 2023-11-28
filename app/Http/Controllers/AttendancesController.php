<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLogs;
use App\Models\AttendanceStatus;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendancesController extends Controller
{

    public function index($status = null)
    {
        $attendance_date = date("Y-m-d");
        if (empty($status)) {
            $status = "NotEntered";
        }

        if ($status == "NotEntered") {
            $data = Employees::select('al.*')
                ->leftJoin('attendance_logs as al', 'employees.id', '=', 'al.emp_id')
                ->select('employees.*')
                ->whereNull('attendance_date')
                ->get();
        } elseif ($status == "Working") {
            $data = Employees::select('al.*')
                ->leftJoin('attendance_logs as al', 'employees.id', '=', 'al.emp_id')
                ->select('employees.*')
                ->where('exit_time', "00:00:00")
                ->where('attendance_date', $attendance_date)
                ->get();
        } elseif ($status == "Exited") {
            $data = Employees::select('al.*')
                ->leftJoin('attendance_logs as al', 'employees.id', '=', 'al.emp_id')
                ->select('employees.*', 'al.*')
                ->whereNot('entry_time', "00:00:00")
                ->where('attendance_date', $attendance_date)
                ->whereNot('exit_time', "00:00:00")
                ->get();
        }
        $current_month = date('m');
        // $total_days = Carbon::createFromDate(null, $current_month, 1)->daysInMonth;





        return view('attendances', ["data" => $data, "status" => $status]);
    }
}
