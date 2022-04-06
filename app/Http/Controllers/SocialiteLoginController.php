<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Redirect the user to the Linkedin authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(['r_liteprofile', 'r_emailaddress'])->redirect();
    }

    /**
     * Obtain the user information from Linkedin.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name'     => $user->name,
                'slug_name' => \Str::slug($user->name),
                'email'    => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'password' => Hash::make(rand(10, 99)),
                'user_type_id' => 4,
            ]);

            Student::create([
                'user_id' => $user->id,
            ]);

            DB::commit();

            return $user;
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong

            return redirect()->route('app.error');
        }
    }
}
