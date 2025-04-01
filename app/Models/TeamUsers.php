<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamUsers extends Model
{
    protected $table='team_user';
    protected $fillable=[
        'user_id',
        'team_id'
    ];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
