<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cardcategory extends Model
{
    public function cards()
    {
        return $this->hasMany(card::class,'id','category_id');
    }

    public function sub_cat()
    {
        return $this->hasMany(cardsubcategory::class,'id','cat_id');
    }
}
