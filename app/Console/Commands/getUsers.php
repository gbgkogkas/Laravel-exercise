<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class getUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all registered users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['id','first_name','mid_name','last_name','name','email','email_verified_at','password','remember_token','created_at','updated_at'];

        $usersModel = User::all();

        $users = [];

        foreach ($usersModel as $key => $userModel) {
            $user = $userModel->toArray();

            foreach ($headers as $field) {
                if (!array_key_exists($field, $user) || empty($user[$field])) {
                    $user[$field] = '-';
                }
            }

            array_push($users, $user);
        }

        $this->table($headers, $users);
    }
}
