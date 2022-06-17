<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceInfo;
use Illuminate\Support\Facades\Validator;
use Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AttendanceInfo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::id();

        $data = $request->all();

        $validator = Validator::make($data, [
            'time_in'                   => 'nullable|time',
            'time_out'                  => 'nullable|time',
            'remaining_working_hours'   => 'nullable|integer',
            'total_undertime_hours'     => 'nullable|time',
            'total_working_hours'       => 'nullable|integer',
            'date_of_duty'              => 'nullable|date'
        ]);

        if($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $attendance = AttendanceInfo::create([
            'user_id'           => $user,
            'time_ine'          => $request->time_in,
            'time_out'          => $request->time_out,
            'remaining_working_hours'   => $request->remaining_working_hours,
            'total_undertime_hours'     => $request->total_undertime_hours,
            'total_working_hours'       => $request->total_working_hours,
            'date_of_duty'              => $request->date_of_duty 
        ]);

        return response()->json([
            "success" => true,
            "message" => "Attendance Created Successfully",
            "data"    => $attendance
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attendance = AttendanceInfo::find($id);
        $attendance->update($request->all());
        return $attendance;
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
}
