<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use Storage;

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
    protected $redirectTo = 'signup_success';//RouteServiceProvider::HOME;
    public $passwordStrength = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
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
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:7', "regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/", 'confirmed'],
        ],
            ['password.regex' => 'Password must be a strong password']
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function generateRandomString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //generating imap email
    public function generateCustomEmail()
    {

        $email_domain = config("app.custom_email_domain");
        $custom_email = $this->generateRandomString(7).'@'.$email_domain;
        // checkin if email not exists then return email
        if (!USER::where('generated_email', $custom_email)->count()) {
            return $custom_email;
        }
        generateCustomEmail();
    }
    // generate a Imap login file
    function generateImapRegistrationLog($log_string) {
        Storage::disk('local')->append('imap_user/dovecot-users.txt', $log_string);
    }

    protected function create(array $data)
    {
        $imap_email = $this->generateCustomEmail();
        $imap_password = $this->generateRandomString(10);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'generated_email' => $imap_email,
            'imap_login' => $imap_email,
            'imap_password' => $imap_password,
            'imap_host' => config("app.imap_host"),
            'password' => Hash::make($data['password']),
            'user_ip' => request()->ip(),
        ]);
        if($user) {
            $this->generateImapRegistrationLog($imap_email.":{plain}".$imap_password);
        }
        return redirect()->route('signup_success')->with('success','A verification email sent to your account!');
        //return  $user;
    }

    public function signup_success() {
        return view('auth.signup_success');
    }

}
