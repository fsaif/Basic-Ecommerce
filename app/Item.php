<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'country', 'img', 'category_id', 'updated_by', 'deleted_by', 'created_by', 'status',
    ];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at', 'created_at', 'updated_at',];

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

    public function creater()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owned_by');
    }

    public function deleter()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

    public function updater()
    {
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

    public static function GetMaxPriority()
    {
        if (count(self::all()) > 0) {
            return self::orderBy('priority', 'desc')->first()->priority;
        } else {
            return -1;
        }
    }

    public static function IncreasePriority($ID)
    {
        $item = self::find($ID);
        if ($item->priority > self::GetMaxPriority())
            return;
        $item->priority = $item->priority + 1;
        $item->save();
        return $item;
    }

    public static function DecreasePriority($ID)
    {
        $item = self::find($ID);
        if ($item->priority == 0)
            return;
        $item->priority = $item->priority - 1;
        $item->save();
        return $item;
    }

    public static function MoveUp($ID)
    {
        $item = self::find($ID);
        if ($item->priority == 0)
            return;
        self::IncreasePriority(self::GetBefore($ID));
        self::DecreasePriority($ID);
    }

    public static function MoveDown($ID)
    {
        $item = self::find($ID);
        if ($item->priority == self::GetMaxPriority())
            return;
        self::DecreasePriority(self::GetAfter($ID));
        self::IncreasePriority($ID);
    }

    public static function GetBefore($ID)
    {
        $item = self::find($ID);
        $item = self::where('priority', '<', $item->priority)->orderBy('priority', 'desc')->first();
        return $item->id;
    }

    public static function GetAfter($ID)
    {
        $item = self::find($ID);
        $item = self::where('priority', '>', $item->priority)->orderBy('priority', 'asc')->first();
        return $item->id;
    }

}
