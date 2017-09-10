<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

trait RegistersUsers
{
    use RedirectsUsers;


    /**
     * Validate the data sent in the request
     * If it fails, create an error message and write to session
     * @param $validator
     * @param $data
     * @return bool
     */
    public function validateRequest(\Illuminate\Contracts\Validation\Validator $validator)
    {

        if ($validator->fails()) {
            $this->createErrorMessageFlashFromValidationErrors($validator);
            return false;
        } else {
            return true;
        }

    }

    /**
     * Handles a failed validation
     * Creates a single string with all the validation errors listed
     * Writes the error message to the session to be consumed by the front-end
     * @param $validator
     * @return string
     * @throws \Exception
     */
    protected function createErrorMessageFlashFromValidationErrors($validator)
    {

        $errors = $validator->errors();
        session()->flash('errors', $errors);

        $errorMessage = "";

        // Bundle all the error messages into a single string and return to the user
        foreach ($errors->all() as $message) {
            $errorMessage = $errorMessage . $message . ' ';
        }
        session()->flash('error_message', $errorMessage);

    }

    /**
     * Fire a new Registered event
     * Inherited from core Laravel
     * @param $user
     */
    protected function publishRegisteredUserEvent($user)
    {
        event(new Registered($user));
    }

    /**
     * Log the user into the session
     * @param User $user
     */
    protected function loginUser(User $user)
    {
        $this->guard()->login($user);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

    }

    /**
     * Get a validator instance from the supplied data
     * @param $data
     * @return mixed
     */
    private function getCompanyUserValidator($data)
    {
        return Validator::make($data, [
            'company_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Get a validator instance from the supplied data
     * @param $data
     * @return mixed
     */
    private function getCandidateUserValidator($data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }
}
