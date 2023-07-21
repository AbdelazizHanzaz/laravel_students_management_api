<?php


namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function register(RegisterRequest $request)
  {
    $validated = $request->validated();

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

        $this->createTokenAndReturnResponse($user);
  }

  public function login(LoginRequest $request)
  {
    $validated = $request->validated();


    $user = User::where('email', $validated['email'])->first();

    if(!$user || !Hash::check($validated['password'], $user->password)) {
      return response([
        'message' => 'Invalid credentials'  
      ], 401);
    }
     
    $this->createTokenAndReturnResponse($user);
    
  }

  protected function createTokenAndReturnResponse($user){
    $token = $user->createToken('api_token')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }

}