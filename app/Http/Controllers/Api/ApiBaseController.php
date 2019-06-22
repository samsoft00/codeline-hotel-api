<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
    public $status_code = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param mixed $status_code
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }

    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }


    public function respond($data, $header = [])
    {
        return response()->json($data, $this->getStatusCode(), $header);
    }


    public function respondWithError($message)
    {
        return $this->respond([
            'error'  =>  [
                'message'        =>  $message,
                'status_code'    =>  $this->getStatusCode()
            ]
        ]);
    }
}
