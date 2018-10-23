<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Item extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'country', 'img', 'category_id', 'created_by',
    ];

    protected  $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function creater() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function owner() {
        return $this->belongsTo('App\User', 'owned_by');
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
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:255',
            'price' => 'required|numeric|min:1',
            'country' => 'required|string|min:1',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
        ]);
    }

}
