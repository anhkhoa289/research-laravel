<?php

namespace App\Http\Controllers;

use App\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Create Root
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRoot()
    {
        $id = $this->departmentRepository->createRoot();
        if ($id) {
            return $this->responseSuccess([ 'id' => $id]);
        } else {
            return $this->responseBadRequest();
        }

    }


}
