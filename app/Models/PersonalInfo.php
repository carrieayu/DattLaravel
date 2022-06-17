<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'age',
        'phone_number',
        'blood_type',
        'birth_plane',
        'civil_status',
        'contact_person',
        'contact_no',
        'date_of_birth',
        'gender',
        'height',
        'weight',
        'personal_email',
        'present_address',
    ];

    protected $dates = [
        'date_of_birth'
    ];

    protected $rules = [
        'user_id'       => 'required|integer',
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
    ];

    protected $validationMessages = [
        'phone_number.regex' => "Mobile number is invalid."
    ];

    public static function rules(){
        return (new static)->rules;
    }
}
