<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword extends Controller implements UpdatesUserPasswords
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    use PasswordValidationRules;


    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (! Hash::check($input['current_password'], $user->password)) {
                throw ValidationException::withMessages(
                    [
                        'current_password' => ['The provided password does not match your current password.'],
                    ]
                );
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }

    public function update_profile(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|regex:/^[a-zA-Z]+$/u|max:255',
            'last_name' => 'required|string|min:3|regex:/^[a-zA-Z]+$/u|max:255',
            'age' => 'required|integer|min:18|max:100',
            'phone' => 'required|string|min:10',
            'sex' => 'required|integer',
            'email' => 'required|email|string|min:3',
        ]);
        $ps = $request->input('password');
        $cp = $request->input('current_password');
        if(isset($ps)||isset($cp))
        {
            $this->update(Auth::user(),$request->input());
        }

        Auth::user()->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'age'=>$request->input('age'),
            'phone'=>$request->input('phone'),
            'sex'=>$request->input('sex'),
            'email'=>$request->input('email'),
        ]);

        return redirect(route('profile.show'))->with('status','Profile updated successfully');
    }
}
