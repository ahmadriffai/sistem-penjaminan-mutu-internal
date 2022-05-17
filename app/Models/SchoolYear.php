<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory, TraitUuid;
    protected $fillable = [
        'year', 'semester'
    ];

    public function journals() {
        return $this->hasMany(Journal::class);
    }

}
