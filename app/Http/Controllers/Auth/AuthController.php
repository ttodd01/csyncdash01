<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'paypal_email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    protected function create(array $data)
    {

        $referred = false;
        if(Session::has('referred_by'))
            $referred = true;
        $user = User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'dailymotion' => $data['dailymotion'],
            'paypal_email' => $data['paypal_email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rank' => 1,
            'head_network' => 1,

        ]);
        return $user;

    }
}