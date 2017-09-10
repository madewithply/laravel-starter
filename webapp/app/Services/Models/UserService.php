<?php

namespace App\Services\Models;

use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{

    /**
     * UserService constructor.
     */
    public function __construct()
    {

    }

    /**
     * Create a new user model and save to memory
     * @param array $data
     * @return User
     */
    public function createUserFromPostData(array $data)
    {

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }


    /**
     * @param User $user
     * @return User
     */
    public function addAppUserRole($user)
    {
        $user->assignRole('app_user');
        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function addAppAdminRole($user)
    {
        $user->assignRole('app_admin');
        return $user;
    }


}