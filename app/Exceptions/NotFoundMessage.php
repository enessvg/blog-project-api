<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponserTrait;
use Illuminate\Support\Facades\Log;


class NotFoundMessage extends Exception
{

    use ApiResponserTrait;
    protected $resource;
  	protected $url;

    public function __construct($resource = "resource", $url = "", $code = 404, Exception $previous = null)
    {
        $this->resource = $resource;
        $message = "The {$resource} you are trying to view was not found!";
      	Log::error($url);
        parent::__construct($message, $code, $previous);
    }

    public function render($request){
        return $this->errorResponse($this->getMessage(), $this->getCode());
    }
}
