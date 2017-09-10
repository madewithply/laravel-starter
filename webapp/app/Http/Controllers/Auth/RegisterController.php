<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Models\UserService;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * @var UserService $userService
     */
    protected $userService;

    protected $redirectToOnSuccess = '/';

    /**
     * Create a new controller instance.
     * Register the guest middleware
     * @param UserService $userService
     */

    public function __construct(UserService $userService)
    {
        $this->middleware('guest');

        // Inject UsersService
        $this->userService = $userService;
    }

    /**
     * Show the candidate registration form
     * @return $this
     */
    public function showUserRegistrationForm()
    {
        return view('pages.register.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {

        // Get the request data
        $data = $request->all();

        // Validate the input
        $valid = $this->validateRequest($this->getCandidateUserValidator($data));

        // If not valid return to the page
        if (!$valid) {
            return back()->withInput($data);
        }

        /** @var User $user */
        $user = $this->userService->createUserFromPostData($data);
        $this->userService->addAppUserRole($user);

        return $this->onSuccessfulRegistration($request, $user);

    }

    /**
     * On a successful registration publish the registered user event, log the user in and redirect
     * @param $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function onSuccessfulRegistration($request, $user)
    {
        // Fire new user registered event
        $this->publishRegisteredUserEvent($user);

        // Login the new user
        $this->loginUser($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectToOnSuccess);
    }

}
