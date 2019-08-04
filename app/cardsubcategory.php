<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cardsubcategory extends Model
{
    protected $guarded=['id'];

    public function cats()
    {
        // return $this->belongsTo(card::class,'id','cat_id');
    }

    public function sub_cat()
    {
        return $this->belongsTo(cardcategory::class, 'cat_id', 'id')->withDefault();
    }

    public function card()
    {
        return $this->hasMany(card::class, 'sub_category_id', 'id');
    }




}
