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
            'grade' => '6',
            'name' => '及川雄太',
            'name_read' => 'Yuta Oikawa',
            'kana_name_read' => 'おいかわゆうた',
        ],
        [
            'grade' => '7',
            'name' => '宮治裕',
            'name_read' => 'Yutaka Miyaji',
            'kana_name_read' => 'みやじゆたか',
        ],
        [
            'grade' => '6',
            'name' => '下田雄太',
            'name_read' => 'Yuta Shimoda',
            'kana_name_read' => 'しもだゆうた',
        ],
        [
            'grade' => '5',
            'name' => '北堀達也',
            'name_read' => 'Tatsuya Kitabori',
            'kana_name_read' => 'きたぼりたつや',
        ],
        [
            'grade' => '4',
            'name' => '酒匂暁史',
            'name_read' => 'Akifumi Sakawa',
            'kana_name_read' => 'さかわあきふみ',
        ],
        [
            'grade' => '4',
            'name' => '中本昌吾',
            'name_read' => 'Shogo Nakamoto',
            'kana_name_read' => 'なかもとしょうご',
        ],
        [
            'grade' => '4',
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
