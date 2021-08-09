<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserAuthController extends Controller
{
    /**
     * Create an instace of UserAuthController
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register a User
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:5',
        ],[
            'name.required' => 'Nome é obrigatório',
            'name.between' => 'Nome precisa ter mais de 2 e menos que 100 caracteres',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email tem que ser válido',
            'email.max' => 'Email tem que ter até 100 caracteres',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha é obrigatória',
            'password.confirmed' => 'Senhas não conferem',
            'password.min' => 'Senha precisa ter no minimo 5 caracteres',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Usuário registrado com sucesso',
            'user' => $user
        ], 201);
    }

    /**
     * Get a JWT token after successful login
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ],[
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email tem que ser válido',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha precisa ter no minimo 5 caracteres',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['message' => ['Email ou senha invalidos']], 401);
        }

        return $this->createNewToken($token);
    }

     /**
     * Get the token array structure.
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => Auth::user()
        ]);
    }


    /**
     * Refresh a JWT token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(Auth::refresh());
    }


    /**
     * Get the Auth user using token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function user() {
        return response()->json(Auth::user());
    }


    /**
     * Logout user (Invalidate the token).
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        Auth::logout();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
