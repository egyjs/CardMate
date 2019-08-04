<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class card extends Model
{

    protected $guarded=['id'];

    public function card()
    {
        return $this->belongsTo(cardsubcategory::class, 'sub_category_id','id')->withDefault();
    }

    public function cats()
    {
        return $this->belongsTo(cardcategory::class, 'category_id','id')->withDefault();
    }


}
