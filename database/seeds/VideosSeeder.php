<?php
declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class VideosSeeder
 */
final class VideosSeeder extends Seeder
{
    protected $initVideos = [
        [],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->initVideos as $initVideo) {
            $initVideo['created_at'] = Carbon::now();
            $initVideo['updated_at'] = Carbon::now();
            DB::table('videos')->insert($initVideo);
        }
    }
}
