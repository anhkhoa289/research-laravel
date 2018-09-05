<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dd(123);
    }

    public function testList()
    {
        $data = [ 'khoa', 'nguyen', 23, 24 ];
        list($ten, $ho) = $data;
        dd($ten, $ho);
    }

    public function testExtract()
    {
        $data = [
            'ten' => 'khoa',
            'ho' => 'nguyen',
            'tuoi' => 23,
        ];
        extract($data);
        dd($ten, $ho, $tuoi);
    }
}
