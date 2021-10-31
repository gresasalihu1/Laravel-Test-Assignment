<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\User\ValidateUserRequest;
use App\Http\Requests\User\ValidatePasswordRequest;
use App\Http\Requests\User\ValidateLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(ValidateLoginRequest $request)
    {
        
        if (!$token = auth()->attempt($request->validated()))
        {
            return $this->error([], __('model.authorized', ['model' => 'User']));
        }
        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(ValidateUserRequest $request)
    {

        $user = User::create(array_merge(
            $request->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return $this->success(new UserResource($user), __('model.created', ['model' => 'User']));
    }


    public function userProfile()
    {
        $user = auth()->user();
        return $this->success(new UserResource($user), __('model.profile', ['model' => 'Profile']));
    }

    public function updatedPassword(ValidatePasswordRequest $request)
    {

        User::where('id', auth()->user()->only('id'))
            ->update(array('password' => bcrypt($request->get('password'))));
        return $this->success(__('model.updated', ['model' => 'Password']));
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
