<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family',
        'province',
        'image',
        'fatherName',
        'birthDay',
        'birthLocation',
        'age',
        'decade',
        'religious',
        'maritalStatus',
        'special',
        'category',
        'categoryTitle',
        'specialTitle',
    ];
}
