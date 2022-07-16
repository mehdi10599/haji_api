<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'shahidId',
        'nationality',
        'dispatchGroup',
        'militaryResponsibility',
        'militaryDegree',
        'education',
        'nickname',
        'biography',
        'testament',
        'shahadatDate',
        'shahadatLocation',
        'shahadatOperationName',
        'shahadatDescription',
        'memoryTitle',
        'memoryDescription',
    ];
}
