<?php
declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class CollaboratorsSeeder
 */
final class CollaboratorsSeeder extends Seeder
{
    protected $initCollaborators = [
        [
            'name' => '及川雄太',
            'name_read' => 'Yuta Oikawa',
            'kana_name_read' => 'おいかわゆうた',
        ],
        [
            'name' => '宮治裕',
            'name_read' => 'Yutaka Miyaji',
            'kana_name_read' => 'みやじゆたか',
        ],
        [
            'name' => '下田雄太',
            'name_read' => 'Yuta Shimoda',
            'kana_name_read' => 'しもだゆうた',
        ],
        [
            'name' => '北堀達也',
            'name_read' => 'Tatsuya Kitabori',
            'kana_name_read' => 'きたぼりたつや',
        ],
        [
            'name' => '酒匂暁史',
            'name_read' => 'Akifumi Sakawa',
            'kana_name_read' => 'さかわあきふみ',
        ],
        [
            'name' => '中本昌吾',
            'name_read' => 'Shogo Nakamoto',
            'kana_name_read' => 'なかもとしょうご',
        ],
        [
            'name' => '丸山拓巳',
            'name_read' => 'Takumi Maruyama',
            'kana_name_read' => 'まるやまたくみ',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->initCollaborators as $initCollaborator) {
            $initCollaborator['created_at'] = Carbon::now();
            $initCollaborator['updated_at'] = Carbon::now();
            DB::table('collaborators')->insert($initCollaborator);
        }
    }
}
