<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tin',
        'pag-ibig',
        'sss',
        'philhealth',
    ];

    protected $rules = [
        'user_id'   => 'required|integer',
        'tin'       => 'required|min:12|max:12',
        'pag-ibig'  => 'required|min:12|max:12',
        'sss'       => 'required|min:12|max:10',
        'philhealth'=> 'required|min:12|max:12',
    ];
}
