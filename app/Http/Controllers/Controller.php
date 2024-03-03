<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\AvailabilityWithService;
use Closure;
use App\Helpers\Helper;
use App\Exceptions\ValidatorException;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests,
        ValidatesRequests,
        AvailabilityWithService;
    
    protected int $responseHTTPCode = 200;

    protected function setResponseHTTPCode(int $code)
    {
        $this->responseHTTPCode = $code;
    }

    protected function getResponseHTTPCode()
    {
        return $this->responseHTTPCode;
    }

    protected function execute(Closure $closure)
    {
        $error = $error_type = $result = $complement = null;
        $status = false;

        try {
            $result = $closure();
            $status = true;
        } catch (ValidatorException $ex) {
            $error_type = get_class($ex);
            $error = $ex->errors;
            $complement = $ex->getFile() . ':' . $ex->getLine();
        } catch (Throwable $th) {
            $error_type = get_class($th);
            $error = $th->getMessage();
            $complement = $th->getFile() . ':' . $th->getLine();
        }

        $defaultJsonResponse = Helper::createDefaultJsonToResponse($status, compact(
            'error', 'error_type', 'result', 'complement'
        ));

        return response()->json($defaultJsonResponse, $this->getResponseHTTPCode());
    }
}
