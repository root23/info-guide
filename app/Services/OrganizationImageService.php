<?php

namespace App\Services;

use App\Models\Organization;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\City;
use App\Models\OrganizationImage;

class OrganizationImageService {
    public function loadImagesFromFolders() {
        $dirs = File::directories(app()->basePath() . '/public/uploads/organizations');

        // Поиск папок с городами
        foreach ($dirs as $dir) {
            $dir = explode('/', $dir);
            $cityList[] = $dir[sizeof($dir) - 1];
        }

        // Ассоциация с городами из БД
        foreach ($cityList as $item) {
            $city = City::where('slug', $item)->get()->first();

            $city_dirs = File::directories(app()->basePath() . '/public/uploads/organizations/' . $item);
            foreach ($city_dirs as $dir) {
                $dir = explode('/', $dir);
                $slug = $dir[sizeof($dir) - 1];

                // Ассоциация организаций с slug (100% покрытие??)
                $organization = Organization::where('city_id', $city->id)
                                ->where('slug', $slug)->get()->first();

                if (!$organization) {
                    continue;
                }

                $organization_images = File::files(app()->basePath() . '/public/uploads/organizations/' .
                    $item . '/' . $slug);

                $i = 0;
                foreach ($organization_images as $organization_image) {
                    $filename = explode('/', $organization_image);
                    $filename = $filename[sizeof($filename) - 1];

                    $move = File::move($organization_image, app()->basePath() . '/public/uploads/' . $filename);

                    $organizationImage = new OrganizationImage();
                    $organizationImage->organization_id = $organization->id;
                    $organizationImage->filename = $filename;
                    if ($i == 0) {
                        $organizationImage->is_main = true;
                    }
                    $organizationImage->save();
                    $i++;
                }

                $result[] = $organization;
            }
        }

        dd('the end');

    }
}
