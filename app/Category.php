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
        'name_en', 'name_ar', 'updated_by', 'deleted_by', 'created_by', 'status',
    ];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at', 'created_at', 'updated_at',];

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public static function getCategory()
    {
        return Category::select('name_' . App::getLocale() . ' ' . 'as name', 'id')->where('status', '=', 0);
    }

    public function creater()
    {
        return $this->belongsTo('App\User', 'created_by');
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
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
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

    public static function IncreasePriority($id)
    {
        $cat = self::find($id);
        if ($cat->priority > self::GetMaxPriority())
            return;
        $cat->priority = $cat->priority + 1;
        $cat->save();
        return $cat;
    }

    public static function DecreasePriority($id)
    {
        $cat = self::find($id);
        if ($cat->priority == 0)
            return;
        $cat->priority = $cat->priority - 1;
        $cat->save();
        return $cat;
    }

    public static function MoveUp($id)
    {
        $cat = self::find($id);
        if ($cat->priority == 0)
            return;
        self::IncreasePriority(self::GetBefore($id));
        self::DecreasePriority($id);
    }

    public static function MoveDown($id)
    {
        $cat = self::find($id);
        if ($cat->priority == self::GetMaxPriority())
            return;
        self::DecreasePriority(self::GetAfter($id));
        self::IncreasePriority($id);
    }

    public static function GetBefore($id)
    {
        $cat = self::find($id);
        $cat = self::where('priority', '<', $cat->priority)->orderBy('priority', 'desc')->first();
        return $cat->id;
    }

    public static function GetAfter($id)
    {
        $cat = self::find($id);
        $cat = self::where('priority', '>', $cat->priority)->orderBy('priority', 'asc')->first();
        return $cat->id;
    }

}
