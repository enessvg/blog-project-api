<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundMessage;
use App\Http\Resources\AgreementsResources;
use App\Models\Agreements;
use Illuminate\Http\Request;

class AgreementsController extends Controller
{
    public function index(){
        $response = Agreements::where('is_visible', 1)->get();
        return response()->json([
            'status' => true,
            'agreements' => AgreementsResources::collection($response),
        ]);
    }


    public function show($slug){
        $agreements = Agreements::where('slug', $slug)->where('is_visible', 1)->first();

        if (!$agreements) {
            throw new NotFoundMessage('agreement', $slug);
        }

        return response()->json([
            'status' => true,
            'agreements' => $agreements,
        ]);

    }
}
