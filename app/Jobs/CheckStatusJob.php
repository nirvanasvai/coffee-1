<?php

namespace App\Jobs;

use App\Models\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CheckStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		dump('start');
		$response = Http::withOptions([
			'debug' => true,
		])->get('http://127.0.0.1:8000/api/test');
		$objects = $response->object();
	
		foreach ($objects as $object)
		{
			$deviceFindForUpdate = [
				'name'=>$object->name,
				'code'=>$object->code,
				'cocoa'=>$object->cocoa,
				'coffee'=>$object->coffee,
				'water'=>$object->water,
				'milk'=>$object->milk,
				'status'=>$object->status,
				'city_id'=>$object->city_id,
				'user_id'=>$object->user_id,
			];
			Device::query()->upsert([$deviceFindForUpdate],['code'],['cocoa','coffee','water','milk','name']);
			dump('end');
		}
    }
}
