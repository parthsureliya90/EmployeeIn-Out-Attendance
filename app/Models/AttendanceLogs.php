<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLogs extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'attendance_logs';
}