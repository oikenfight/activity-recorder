<?php
declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class UsersSeeder
 */
final class UsersSeeder extends Seeder
{
    protected $initUsers = [
        [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ],
        [
            'name' => 'oikenfight',
            'email' => 'oikenfight@gmail.com',
            'password' => 'password',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->initUsers as $initUser) {
            $initUser['password'] = bcrypt($initUser['password']);
            $initUser['created_at'] = Carbon::now();
            $initUser['updated_at'] = Carbon::now();
            DB::table('users')->insert($initUser);
        }
    }
}
