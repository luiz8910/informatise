<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\PasswordChanged;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use App\Traits\Config;
use App\Traits\Login;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, Login, Config;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $user = DB::table('users')
            ->where([
                'email' => $request->get('email'),
                'active' => 1,
                'status' => 1
            ])->first();



        if($user)
            //if (Hash::check($request->get('password'), $user->password)) {
            if ($this->attemptLogin($request)){
                return $this->sendLoginResponse($request);
            }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    //Send link when forgot password button was clicked
    public function send_link_reset_pass($email)
    {
        try {
            $user = $this->users->findByField('email', $email)->first();

            if($user)
            {
                $token = $this->random_string(15);

                $data['email'] = $email;
                $data['token'] = $token;
                $data['created_at'] = Carbon::now();
                $data['expires_in'] = Carbon::now()->addDay();

                $this->reset_pass($data);

                Mail::to($email)->send(new ForgotPassword($token));

                return json_encode(['status' => true]);
            }
            else
                return json_encode(['status' => false, 'msg' => 'Este usu??rio n??o existe']);
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
            //return json_encode(['status' => false, $e->getMessage()]);
        }

    }

    //Reset password view
    public function new_password_view($token)
    {
        $t_exists = DB::table('password_resets')
            ->where('token', $token)
            ->first();

        if($t_exists)
        {
            if(date_create($t_exists->expires_in) > date_create())
                return view('auth.passwords.new', compact('token'));

            else
                abort(500);
        }

        else
            abort(500);
    }


    public function new_password(Request $request, $token)
    {
        DB::beginTransaction();

        try {
            $t_exists = DB::table('password_resets')
                ->where('token', $token)
                ->first();

            $data = $request->all();

            if($t_exists)
            {
                if(date_create($t_exists->expires_in) > date_create())
                {
                    $user = $this->users->findByField('email', $t_exists->email)->first();

                    $data['password'] = Hash::make($request->get('password'));

                    $this->users->update($data, $user->id);

                    DB::commit();

                    Mail::to($user)->send(new PasswordChanged());

                    $request->session()->flash('success.msg', 'A sua senha foi alterada');

                    return redirect('/login');
                }

                else
                    abort(500);
            }

            else
                abort(500);

        }catch (\Exception $e){
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu, tente novamente mais tarde');

            dd($e);
        }

    }
}
