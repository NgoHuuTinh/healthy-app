<?php

namespace App\Http\Controllers;

/*
* This class should be parent class for other API controllers
* Class BaseController
*/

class BaseController extends Controller
{
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;

    /**
     * Return generic json response with the given data.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($data, $statusCode = self::HTTP_OK, $headers = [])
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], $statusCode);
    }

    /**
     * Respond with success.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccess($message = '', $statusCode = self::HTTP_OK)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ], $statusCode);
    }

    /**
     * Respond with error.
     *
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondError($message = '', $statusCode = self::HTTP_OK)
    {
        return response()->json([
            'status' => 'fails',
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Respond with unauthorized.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->respondError($message, self::HTTP_UNAUTHORIZED);
    }

    /**
     * Respond with forbidden.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($message = 'Forbidden')
    {
        return $this->respondError($message, self::HTTP_FORBIDDEN);
    }

    /**
     * Respond with not found.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($message = 'Not Found')
    {
        return $this->respondError($message, self::HTTP_NOT_FOUND);
    }
}
