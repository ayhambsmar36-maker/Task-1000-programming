<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'birth_date',
        'classroom_id',
        
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }


}
