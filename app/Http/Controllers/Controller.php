<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Info(
 *     title="News OpenAPI",
 *     version="0.0.1",
 *     @OA\Contact(
 *         email="eray@bahadir.me"
 *     )
 * )
 *
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function callAction($method, $parameters)
    {
        Log::info(sprintf('%s sınıfının %s methodu çağırıldı.', get_class($this), $method), $parameters);

        return $this->{$method}(...array_values($parameters));
    }
}
