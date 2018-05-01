<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gear extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    public $table = 'gear_list';

    public function getCategory()
    {
        return $this->hasMany(GearCategories::class, 'id', 'category_id');
    }

}
