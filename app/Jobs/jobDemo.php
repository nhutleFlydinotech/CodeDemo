<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Redis;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class jobDemo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $param;
    /**
     * Create a new job instance.
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("succes!!!" . $this->param);
    }
}
