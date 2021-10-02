<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use function Livewire\str;

class Device extends Model
{
    use HasFactory;
    
    protected $guarded;
    
    public function cityRelationship()
	{
		return $this->hasOne(City::class,'id','city_id');
	}
	
	public function errorRelationship()
	{
		return $this->hasOne(ErrorList::class,'id','error_id');
	}
	public function companyRelationship()
	{
		return $this->hasOne(Company::class,'id','company_id');
	}
    public function lastdowntime($status){
        return $this->hasMany(Downtime::class)->where('status', $status)->orderByDesc('id')->first();
    }
    public function downtimes(){
        return $this->hasMany(Downtime::class)->orderByDesc('id')->first();
    }
    public static function hour_diff($d1, $d2) {
        $d1 = new Datetime( $d1);
        $d2 = new Datetime( $d2);
        $diff = date_diff( $d1, $d2, true);
        $hour = 0;


        if($diff->i){
            $hour += $diff->i;
        }
        if($diff->h){
            $hour += $diff->h*60;
        }
        if($diff->d){
            $hour += $diff->d*24*60;
        }
        return str($hour) ;
    }
    static function _saving($model) {
        $device_components_array = [];
        $device_components_array[] = $model->cocoa;
        $device_components_array[] = $model->coffee;
        $device_components_array[] = $model->milk;
        $device_components_array[] = $model->water;
        sort($device_components_array , SORT_NUMERIC);


        if($device_components_array[0] == 0){
            $model->status = 3;
        }elseif ($device_components_array[0] >= 1 & $device_components_array[0] <= 30){
            $model->status = 2;
        }else{
            $model->status = 1;
        }

        $old_device = self::find($model->id);
        if($old_device){
            if($old_device->status != $model->status){
                $check = $model->lastdowntime($old_device->status);
                if($check){
                    if($check->stop_downtime){
                        $downtime = new Downtime();
                        $downtime->downtime = date('Y-m-d H:i:s' , time());
                        $downtime->status = $model->status;
                        $downtime->device_id = $model->id;
                        $downtime->save();
                    }else{
                        $downtime = $old_device->downtimes();
                        $downtime->stop_downtime = date('Y-m-d H:i:s' , time());
                        $downtime->status = $old_device->status;
                        $downtime->update();

                        $downtime = new Downtime();
                        $downtime->downtime = date('Y-m-d H:i:s' , time());
                        $downtime->status = $model->status;
                        $downtime->device_id = $model->id;
                        $downtime->save();
                    }
                }else{
                    $downtime = new Downtime();
                    $downtime->downtime = date('Y-m-d H:i:s' , time());
                    $downtime->status = $model->status;
                    $downtime->device_id = $model->id;
                    $downtime->save();
                }
            }
        }
    }

    public static function boot(){
        parent::boot();

//        self::updating(function ($model){
//            self::_saving($model);
//        });
        self::saving(function ($model){
            self::_saving($model);
        });
    }
}
