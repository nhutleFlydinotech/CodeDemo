<?php

namespace App\Http\Controllers;

use Exception;
use App\Jobs\jobDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class demoController extends Controller
{
    public function testQueue()
    {
        try {
            Cache::store('redis')->put('test_2', 22222);
            jobDemo::dispatch('hello');
            return Cache::get('test_2');
        } catch (Exception $e) {
            Log::error($e);
            return 'fail';
        }
    }
}
