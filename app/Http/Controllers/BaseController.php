<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 9/3/2018
 * Time: 6:20 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Response;

trait BaseController
{

    /**
     * Response Success
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = [], $message = '')
    {
        return response()->json(
            [
                'status' => true,
                'content' => $data,
                'message' => $message,
                'error' => array()
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Response Bad Request
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseBadRequest($data = [], $message = '')
    {
        return response()->json(
            [
                'status' => false,
                'content' => $data,
                'message' => $message,
                'error' => array()
            ],
            Response::HTTP_BAD_REQUEST
        );
    }

    /**
     * Response list without paging
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseList($data = [], $message = '')
    {
        return response()->json(
            [
                'status' => true,
                'content' => [
                    'data' => $data,
                ],
                'message' => $message,
                'error' => array()
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Response list with paging
     * @param array $pagingData = array(
     *      'data' => [],
     *      'perPage' => 10,
     *      'current' => 1
     * )
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responsePaging($pagingData = [], $message = '')
    {
        extract($pagingData);
        if (isset($data) && isset($total) && isset($perPage) && isset($current)) {
            return response()->json(
                [
                    'status' => true,
                    'content' => [
                        'data' => $data,
                        'total' => $total,
                        'perPage' => $perPage,
                        'current' => $current,
                    ],
                    'message' => $message,
                    'error' => array()
                ],
                Response::HTTP_OK
            );
        } else {
            return $this->responseBadRequest();
        }
    }
}