<?php

namespace App\Http\Controllers\Auth;

use App\user_reader;
use App\user_preference;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
            'user_fname' => 'required|string|max:255',
            'user_lname' => 'required|string|max:255',
            'user_dob' => 'required|string|max:255',
            'user_address' => 'required|string|max:255',
            'user_city' => 'required|string|max:255',
            'user_state' => 'required|string|max:255',
            'user_phone' => 'required|numeric',
            'username' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:user_reader',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation'=>'required||string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\user_reader
     */
    protected function create(array $data)
    {
        $uid=self::getunique();
        $category = Input::get('category');
        $user = user_reader::create([
            'user_id'=>$uid,
            'user_fname' => $data['user_fname'],
            'user_lname' => $data['user_lname'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'user_dob' => $data['user_dob'],
            'user_email' => $data['user_email'],
            'user_phone' => $data['user_phone'],
            'user_address' => $data['user_address'],
            'user_city'=>$data['user_city'],
            'user_state'=>$data['user_state']]);
            
            foreach($category as $category_id){
                $user_preference = user_preference::create([
                'user_id'=>$uid,
                'genre_id'=>$category_id
                ]);
            }
            
            $user->save();
        return $user;
    }

    function getToken($length)
    {
        $token = "";
        
        $codeAlphabet= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::crypto_rand_secure(0, $max-1)];
        }

        
        return $token;
    }

    function getunique(){
        $token= self::getToken(5);// change the value to the length u want
        $temp = user_reader::find($token);
        if(is_null($temp)){
            //change the query to check with id that exist in database
            return $token;
        }
        else {
            $token= self::getunique();
            return $token;

        }
    }
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
}
