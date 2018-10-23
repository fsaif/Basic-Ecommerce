<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'created_by', 'item_id',
    ];

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
