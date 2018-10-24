<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_en', 'name_ar', 'updated_by' , 'deleted_by', 'created_by', 'status',
    ];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at', 'created_at', 'updated_at',];

    public function items(){
        return $this->hasMany('App\Item');
    }

    public static function getCategory()
    {
        return Category::select('name_' . App::getLocale() . ' ' . 'as name', 'id' );
    }

    public function creater() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function deleter() {
        return $this->belongsTo('App\User', 'deleted_by');
    }

    public function updater() {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public static function validator(array $data)
    {
        return Validator::make($data, [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);
    }

}
