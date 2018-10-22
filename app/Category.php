<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    protected $fillable = [
        'name_en', 'name_ar',
    ];

    protected $primaryKey = 'id';

    public function items(){
        return $this->hasMany('App\Item');
    }

    public static function getCategory()
    {
        return Category::select('name_' . App::getLocale() . ' ' . 'as name', 'id' );
    }

    public static function validator(array $data)
    {
        return Validator::make($data, [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);
    }

}
