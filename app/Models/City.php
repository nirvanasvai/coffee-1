<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
	
	
	public static function boot()
	{
		parent::boot();
		
		self::created(function ($model) {
			$model->slug = Str::slug($model->name);
			$model->save();
		});
	}
	
	public function device()
	{
		return $this->hasMany(Device::class,'city_id','id');
	}
	
	public function companies()
	{
		return $this->hasMany(Company::class,'city_id','id')->with('deviceRelationship');
	}
	
//	public function

}
