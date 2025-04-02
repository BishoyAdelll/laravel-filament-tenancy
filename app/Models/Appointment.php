<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable=[
        'visitor_name',
        'job',
        'national_number',
        'reason',
        'start_time',
        'end_time',
        'employee_id',
        'team_id',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
