<?php


namespace App\Repositories;



use App\User;
use Illuminate\Routing\Route;
use Illuminate\Validation\ValidationException;
use Validator;

class UserRepository
{
    function __construct() {
    }

    public function getUser ($input) {
        $validator = Validator::make($input, [
            'id' => [
                'required',
                'numeric',
                'exists:users,id'
            ]
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        return User::where('id', $input['id'])->first()->toArray();
    }

    public function registerUser ($input) {
        $validator = Validator::make($input, [
            'first_name' => [
                'required',
                'alpha',
            ],
            'mid_name' => [
                'sometimes',
                'required',
                'alpha',
            ],
            'last_name' => [
                'required',
                'alpha',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'between:6,8',
            ],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $name = $input['first_name'];

        if (array_key_exists('mid_name', $input)) {
            $name .= ' ' . $input['mid_name'];
        }

        $name .= ' ' . $input['last_name'];

        $input['name'] = $name;

        $user =  new User($input);
        $user->save();

        return redirect(\route('profile', ['id' => $user->id]));
    }

    public function deleteUser($input)
    {
        $validator = Validator::make($input, [
            'id' => [
                'required',
                'numeric',
                'exists:users,id'
            ]
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = User::where('id', $input['id'])->first();
        $user->delete();
        return true;
    }


}
