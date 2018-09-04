<?php
declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class ActionsSeeder
 */
final class ActionsSeeder extends Seeder
{
    protected $initActions = [
        [
            'name' => 'test1',
            'japanese_name' => 'テスト1',
        ],
        [
            'name' => 'test2',
            'japanese_name' => 'テスト2',
        ],
        [
            'name' => 'put_something',
            'japanese_name' => 'モノを置く',
        ],
        [
            'name' => 'take_something',
            'japanese_name' => 'モノを取る',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->initActions as $initAction) {
            $initAction['created_at'] = Carbon::now();
            $initAction['updated_at'] = Carbon::now();
            DB::table('actions')->insert($initAction);
        }
    }
}
