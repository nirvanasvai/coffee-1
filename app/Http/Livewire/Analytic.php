<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Device;
use App\Models\Downtime;
use Livewire\Component;
use DateTime;

class Analytic extends Component
{
    public $cities ;
    public $city ;
    public $companies ;
    public $company ;
    public $devices;
    public $device;
    public $downtimes;
    public $a ;



    public function mount(){
        $this->cities = City::query()->get();
        $this->a = new Device();
//        dd($this->a->hour_diff( '2021-10-02 11:30:57', '2021-10-02 11:34:39'));
    }

    /**
     * @return array
     */
    public function updatedCity()
    {
        $this->companies = Company::query()->where('city_id' , $this->city)->get();
    }

    public function updatedCompany()
    {
        $this->devices = Device::query()->where('company_id' , $this->company)->get();
    }
    public function updatedDevice()
    {
        $this->downtimes = Downtime::query()->where('device_id' , $this->device)->orderBy('id')->get();
    }
    public function render()
    {
        return view('livewire.analytic');
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
        return $hour ;
    }
}
