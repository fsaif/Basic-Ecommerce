<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'img', 'updated_by' , 'deleted_by', 'created_by', 'status',
    ];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'email_verified_at',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function items(){
        return $this->hasMany('App\Item');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
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
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public static function emailValidator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    public static function userValidator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
        ]);
    }

    public static function passwordValidator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public static function imgValidator(array $data)
    {
        return Validator::make($data , [
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }


}
