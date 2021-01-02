<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Taxi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use App\Http\Resources\SearchResource;

class SearchController extends Controller {

    const BUFFER = 10;  // 10 characters: to show 10 neighbouring characters around the searched word

    private function getModelNamespacePrefix() {
        return app()->getNamespace() . 'Models\\';
    }

    public function search(Request $request) {
        $keyword = $request->search;

        $files = File::allFiles(app()->basePath() . '/app/Models');

        $results = collect($files)->map(function (SplFileInfo $file) {
            $filename = $file->getRelativePathname();

            if (substr($filename, -4) !== '.php') {
                return null;
            }

            return substr($filename, 0, -4);
        })->filter(function (?string $classname) {
           if ($classname === null) {
               return false;
           }

           $reflection = new \ReflectionClass($this->getModelNamespacePrefix() . $classname);
           $isModel = $reflection->isSubclassOf(Model::class);
           $searchable = $reflection->hasMethod('search');

           return $isModel && $searchable;
        })->map(function ($classname) use ($keyword) {
            $model = app($this->getModelNamespacePrefix() . $classname);

            return $model::search($keyword)->take(5)->get()->map(function ($modelRecord) use ($model, $keyword, $classname) {
                $fields = array_filter($model::SEARCHABLE_FIELDS, fn($field) => $field !== 'id');

                $fieldsData = $modelRecord->only($fields);
                $serializedValues = collect($fieldsData)->join(' ');
                $searchPos = strpos(mb_strtolower($serializedValues), mb_strtolower($keyword));

                if ($searchPos !== false) {
                    $start = $searchPos - self::BUFFER;

                    $start = $start < 0 ? 0 : $start;

                    $length = strlen($keyword) + 2 * self::BUFFER;

                    $sliced = mb_substr($serializedValues, $start, $length);

                    $shouldAddPrefix = $start > 0;
                    $shouldAddPostfix = ($start + $length) < strlen($serializedValues);

                    $sliced = $shouldAddPrefix ? '...' . $sliced : $sliced;
                    $sliced = $shouldAddPostfix ? $sliced . '...' : $sliced;
                }

                $modelRecord->setAttribute('match', $sliced ?? mb_substr($serializedValues, 0, 20) . '...');
                $modelRecord->setAttribute('model', $classname);
//                $modelRecord->setAttribute('view_link', $this->resolveModelViewLink($modelRecord));
                return $modelRecord;
            });
        })->flatten(1);

        return SearchResource::collection($results);
    }
}
