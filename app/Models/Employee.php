<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    protected $table = 'employees';
    
    protected $fillable = [
        'registration',
        'name',
        'email',
        'password'
    ];

    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }
}
