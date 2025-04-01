<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=[
        'name',
        'title',
        'email',
        'image',
        'team_id',

    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
