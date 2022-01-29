<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WithModelJsonController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $test = new class extends Model
        {
            public function toJson($options = 0)
            {
                return [
                    'tenant_route' => tenant_route(),
                ];
            }
        };

        return $test;
    }
}
