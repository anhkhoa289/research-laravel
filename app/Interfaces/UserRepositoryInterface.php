<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 8/12/2018
 * Time: 11:30 PM
 */

namespace App\Interfaces;


use App\Interfaces\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function login(String $username, String $password);
}