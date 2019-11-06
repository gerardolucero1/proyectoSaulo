<?php

namespace App;

use App\Ticket;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id',
        'name',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
