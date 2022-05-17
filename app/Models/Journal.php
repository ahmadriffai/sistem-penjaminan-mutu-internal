<?php

namespace App\Models;

use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory, TraitUuid;

    protected $fillable = [
        'title',
        'link',
        'year',
        'month',
        'media',
        'issn',
        'criteria',
        'category',
        'lecturer_id',
        'shool_year_id',
        'isAccept',
    ];

    public function lecturer() {
        return $this->belongsTo(Lecturer::class);
    }

    public function schoolYear() {
        return $this->belongsTo(Journal::class);
    }
}
