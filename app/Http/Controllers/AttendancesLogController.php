<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLogs;
use App\Models\AttendanceStatus;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendancesLogController extends Controller
{

    // salary is calculated on only week days. Weekends Sunday and Saturday is not calculated. 
    public function store($id, $status)
    {

        if (empty($id)) {
            return back()->with('warning', 'Try Again');
        }
        if (empty($status) && ($status != "IN" || $status != "OUT")) {
            return back()->with('warning', 'Try Again');
        }

        $attendance_date = date("Y-m-d");
        $current_time = date("H:i:s");
        if ($status == "IN") {
            $create = new AttendanceLogs();
            $create->emp_id = $id;
            $create->attendance_date = $attendance_date;
            $create->entry_time = $current_time;
            $create->exit_time = "00:00:00";
            $create->total_woking_hours = 00;
            if ($create->save()) {
                $msg = "Employee Entred. Time .:" . date("h:i:s A");
                return back()->with('success', $msg);
            } else {
                return back()->with('warning', 'Try Again');
            }
        } elseif ($status == "OUT") {


            $getEnterTime = AttendanceLogs::where('emp_id', $id)->where('exit_time', "00:00:00")->where('attendance_date', $attendance_date)->select('id', 'entry_time')->get();

            $entry_time = $getEnterTime[0]->entry_time;
            $attandance_log_id = $getEnterTime[0]->id;

            $totalDaysinMonth = Carbon::createFromDate(null, date("m"), 1)->daysInMonth;

            // calculate time differance
            $start_time = date('H:I', strtotime($entry_time));
            $end_time = date('H:I', strtotime($current_time));

            $start_time = \Carbon\Carbon::parse($start_time);

            $end_time = \Carbon\Carbon::parse($end_time);
            $total_woking_hours = $end_time->diffInHours($start_time);
            // calculate time differance


            $getEmpData = Employees::where('id', $id)->select('salary')->get();
            $monthlySalary = $getEmpData[0]->salary;


            $startDate = Carbon::create(date('Y-m-d', strtotime('first day of this month')));
            $endDate = Carbon::create(date('Y-m-t', strtotime('last day of this month')));

            $no_of_weekends = $startDate->diffInDaysFiltered(function (Carbon $date) {
                return $date->isWeekend(); //calculate weekedns in current month
            }, $endDate);


            $totalWorkingDays = $totalDaysinMonth - $no_of_weekends; // total payable days in this month

            //salary Calculation
            $hoursPerDay = 8;
            //$workingDays=21;
            $hoursPerMonth = $hoursPerDay * $totalWorkingDays;
            $hourlyPay = $monthlySalary / $hoursPerMonth;
            $bonus_hours = 0;
            $bonus_pay = 0;
            if ($total_woking_hours > 8) {
                $bonus_hours = $total_woking_hours - $hoursPerDay;
                $bonus_pay = $bonus_hours * $hourlyPay;
            }
            //salary Calculation

            $total_woking_hours = $total_woking_hours - $bonus_hours;
            $dailyPay = $hourlyPay * $total_woking_hours;
            ///updatind data into table
            $update = AttendanceLogs::where('id', $attandance_log_id)->update([
                'exit_time' => $current_time,  'total_woking_hours' => $total_woking_hours, 'hourly_pay' => $hourlyPay, 'dailyPay' => $dailyPay, 'bonus_pay' => $bonus_pay, 'bounus_woking_hours' => $bonus_hours
            ]);
            ///updatind data into table
            $msg = "Employee Out. Time .:" . date("h:i:s A");
            return back()->with('success', $msg);
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
}
