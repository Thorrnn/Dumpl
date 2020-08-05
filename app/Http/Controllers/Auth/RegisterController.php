<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string'],
            'role' => [
                Rule::in(['admin', 'moderator','user']),
            ],
            'sex' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'education' => [
                'required',
                Rule::in(['preschool', 'generalSecondary', 'out-of-school', 'vocational', 'higher',
                    'postgraduate', 'graduateSchool', 'doctoralStudies', 'self-education']),
            ],
            'aboutMyself' => ['string'],
            'fieldActivity' => [
                'required',
                Rule::in(['ecology', 'economy', 'medicine', 'physicalEducation' , 'pedagogy' , 'management' , 'art' , 'science']),
            ],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'education' => $data['education'],
            'aboutMyself' => $data['aboutMyself'],
            'fieldActivity' => $data['fieldActivity'],
            'password' => Hash::make($data['password']),
        ]);
        \DB::table('user_roles')->insert([
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
