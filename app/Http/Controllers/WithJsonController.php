<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WithJsonController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $test = new class extends JsonResource
        {
            public function __construct()
            {
                //
            }

            public function toArray($request)
            {
                tenant_route();

                return [];
            }
        };

        return response()->json($test::make([]));
    }
}
