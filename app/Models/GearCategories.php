<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GearCategories extends Model
{

    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'gear_categories';
}
