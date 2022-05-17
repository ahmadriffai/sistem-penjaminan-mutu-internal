<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lecturer extends Model
{
    use HasFactory, TraitUuid, Notifiable;

    protected $fillable = [
        'nidn',
        'name',
        'address',
        'phone',
        'birthday',
        'imageUrl',
        'gender',
        'major',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journals() {
        return $this->hasMany(Journal::class);
    }

}
