<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'comment', 'created_by', 'item_id', 'updated_by' , 'deleted_by',
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at',];

    protected  $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Item');
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

}
