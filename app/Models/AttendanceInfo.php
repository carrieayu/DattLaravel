<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'time_in',
        'time_out',
        'remaining_working_hours',
        'total_undertime_hours',
        'total_working_hours',
        'date_of_duty',
    ];

    protected $dates = [
        'date_of_duty'
    ];

    protected $time = [
        'time_in',
        'time_out',
        'total_undertime_hours'
    ];

    protected $rules = [
        'user_id'                   => 'required|integer',
        'time_in'                   => 'nullable|time',
        'time_out'                  => 'nullable|time',
        'remaining_working_hours'   => 'nullable|integer',
        'total_undertime_hours'     => 'nullable|time',
        'total_working_hours'       => 'nullable|integer',
        'date_of_duty'              => 'required|date'
    ];

    public static function rules() {
        return (new static)->rules;
    }
}
