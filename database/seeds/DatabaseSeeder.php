<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ActionsSeeder::class);
        $this->call(CollaboratorsSeeder::class);
        $this->call(UsersSeeder::class);
        // $this->call(VideosSeeder::class);
    }
}
