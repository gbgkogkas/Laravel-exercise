<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getProfile (Request $request) {
        $userRepository = new UserRepository();

        $profile = $userRepository->getUser($request->route()->parameters);

        return view('profile')
            ->with('profile', $profile);
    }

    public function userCreationPage (Request $request) {

        return view('add');
    }

    public function createUser (Request $request) {
        $userRepository = new UserRepository();

        try {
            return $userRepository->registerUser($request->input());
        } catch (ValidationException $e) {
            return redirect(\route('registerUser'))
                ->with('errors', $e->validator->getMessageBag()->getMessages());
        }
    }

    public function getDeletePage () {
        return view('delete');
    }

    public function deleteUser (Request $request) {
        $userRepository = new UserRepository();

        try {
            dd($userRepository->deleteUser($request->input()));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
