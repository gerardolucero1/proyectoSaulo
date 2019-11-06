<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'direction',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
