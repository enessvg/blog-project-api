<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioContactRequest;
use App\Models\Portfolio\PortfolioContact;
use App\Traits\ApiResponserTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    use ApiResponserTrait;

    public function store(PortfolioContactRequest $request){
        try {
            
            PortfolioContact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            ]);
        
            return $this->successResponse(null, 'Contact created.', 201);
        
        } catch (Exception $e) {
            Log::error($e->getMessage());
            
            return $this->errorResponse('Error', 500);
        }
        
    }
}
