<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PersonalInfoResource;

use Auth;

class PersonalInforController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalInfo = PersonalInfo::all();
        return response()->json([
            "success" => true,
            "message" => "Personal Information",
            "data" => $personalInfo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::id();

        $validator = Validator::make($data, [
            'first_name'    => 'required',
            'middle_name'   => 'nullable',
            'last_name'     => 'required',
            'suffix_name'   => 'nullable',
            'age'           => 'required',
            'phone_number'  => 'required',
            'blood_type'    => 'nullable',
            'birth_place'   => 'required',
            'civil_status'  => 'required',
            'contact_person'=> 'required',
            'contact_no'    => 'required',
            'date_of_birth' => 'required|date',
            'gender'        => 'nullable',
            'height'        => 'nullable',
            'weight'        => 'nullable',
            'personal_email'=> 'required|email',
            'present_address'=> 'required'
        ]);

        if($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $personalInfo = PersonalInfo::create([
            'user_id'       => $user,
            'first_name'    => $request->first_name,
            'middle_name'   => $request->middle_name,
            'last_name'     => $request->last_name,
            'suffix_name'   => $request->suffix_name,
            'age'           => $request->age,
            'phone_number'  => $request->phone_number,
            'blood_type'    => $request->blood_type,
            'birth_place'   => $request->birth_place,
            'civil_status'  => $request->civil_status,
            'contact_person'=> $request->contact_person,
            'contact_no'    => $request->contact_no,
            'date_of_birth' => $request->date_of_birth,
            'gender'        => $request->gender,
            'height'        => $request->height,
            'weight'        => $request->weight,
            'personal_email'=> $request->personal_email,
            'present_address'=> $request->present_address,
        ]);

        return response()->json([
            "success"   => true,
            "message"   => "Personal Information Created Successfully",
            "data"      => $personalInfo
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInfo $personalInfo)
    {
        return response(['personalInfo' => new PersonalInfoResource($personalInfo), 'message' => 'Retrieved Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $personal = PersonalInfo::find($id);
        $personal->update($request->all());
        return $personal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInfo $personalInfo)
    {
        $personalInfo->delete();

        return response(['message' => 'Deleted']);
    }
}
