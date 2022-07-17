<?php

namespace App\Models;

use App\Http\Controllers\ImageCollectionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family',
        'province',
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

    public function images()
    {
        return $this->hasMany(ImageCollection::class,'shahidId','id');
    }
}
