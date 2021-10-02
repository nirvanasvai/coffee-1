<?php

namespace App\Console\Commands;

use App\Jobs\CheckStatusJob;
use App\Models\Device;
use App\Models\Downtime;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CheckStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dump('start');
        $response = Http::withOptions([
            'debug' => true,
        ])->get('http://coffe.test/api/test');
        $objects = $response->object();
        foreach ($objects as $object) {
            $a = Device::query()->where('code', $object->code)->first();

//            $a->name = $object->name;
//            $a->filial_name = $object->filial_name;
//            $a->company_id = $object->company_id;
//            $a->code = $object->code;
            $a->cocoa = $object->cocoa;
            $a->coffee = $object->coffee;
            $a->water = $object->water;
            $a->milk = $object->milk;
//            $a->city_id = $object->city_id;
//            $a->user_id = $object->user_id;
            $a->error_id = $object->error_id;

            $a->update();
            dump('end');
        }
    }

}
