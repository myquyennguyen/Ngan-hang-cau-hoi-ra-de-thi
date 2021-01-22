<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\canbo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function MaCanBo() {
    return 'MaCanBo';
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'MaCanBo' => ['required', 'string', 'max:255','unique:canbo'],
            'MaBoMon' => ['required', 'string', 'max:255'],
            'HoTen' => ['required', 'string', 'max:255'],
            'NgaySinh' => ['required', 'string', 'max:255'],
            'GioiTinh' => ['required', 'string', 'max:255'],
            'HocVi' => ['required', 'string', 'max:255'],
            'MaChucVu' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return canbo::create([
            'MaCanBo' => $data['MaCanBo'],
            'MaBoMon' => $data['MaBoMon'],
            'HoTen' => $data['HoTen'],
            'NgaySinh' => $data['NgaySinh'],
            'GioiTinh' => $data['GioiTinh'],
            'HocVi' => $data['HocVi'],
            'MaChucVu' => $data['MaChucVu'],
        ]);
        ]);
    }
}
