<?php

namespace App\Models;

use App\Http\Controllers\ImageCollectionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'shahidId',
        'imageField',
        'imageAddress',
    ];

    public function initialInfo()
    {
        return $this->belongsTo(ImageCollection::class,'shahidId','id');
    }
}
