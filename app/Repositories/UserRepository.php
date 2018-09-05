<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 8/12/2018
 * Time: 11:30 PM
 */

namespace App\Repositories;


use App\Interfaces\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    protected $table = 'Users';

    public function login(String $username, String $password)
    {
        // TODO: Implement login() method.
    }
}