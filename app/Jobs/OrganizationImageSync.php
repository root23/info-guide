<?php

namespace App\Jobs;

use App\Models\OrganizationImage;
use App\Services\OrganizationImageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrganizationImageSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param OrganizationImage $image
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
        logs()->info('Запущена работа ]');
//        OrganizationImageService::loadImagesFromFolders();
        OrganizationImageService::testJob();
    }
}
