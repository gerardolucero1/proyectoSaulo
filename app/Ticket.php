<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'employee_id',
        'engineer_id',
        'user_id',
        'priority',
        'activity',
        'notes',
        'folio',
        'archived',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function engineer()
    {
        return $this->belongsTo(Employee::class, 'engineer_id');
    }

    public function user()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
