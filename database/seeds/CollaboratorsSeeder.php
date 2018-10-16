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
            'name' => '及川',
            'name_read' => 'Yuta Oikawa',
            'kana_name_read' => 'おいかわゆうた',
        ],
        [
            'grade' => '7',
            'name' => '宮治先生',
            'name_read' => 'Yutaka Miyaji',
            'kana_name_read' => 'みやじゆたか',
        ],
        [
            'grade' => '6',
            'name' => 'しもやん',
            'name_read' => 'Yuta Shimoda',
            'kana_name_read' => 'しもだゆうた',
        ],
        [
            'grade' => '5',
            'name' => 'ぼりさん',
            'name_read' => 'Tatsuya Kitabori',
            'kana_name_read' => 'きたぼりたつや',
        ],
        [
            'grade' => '4',
            'name' => 'さかわ',
            'name_read' => 'Akifumi Sakawa',
            'kana_name_read' => 'さかわあきふみ',
        ],
        [
            'grade' => '4',
            'name' => 'しょうご',
            'name_read' => 'Shogo Nakamoto',
            'kana_name_read' => 'なかもとしょうご',
        ],
        [
            'grade' => '4',
            'name' => 'まるたく',
            'name_read' => 'Takumi Maruyama',
            'kana_name_read' => 'まるやまたくみ',
        ],
        [
            'grade' => '4',
            'name' => 'DRA☆GON',
            'name_read' => 'Ryuki Wada',
            'kana_name_read' => 'わだりゅうき',
        ],
        [
            'grade' => '4',
            'name' => 'ゆうき',
            'name_read' => 'Yuki Kato',
            'kana_name_read' => 'かとうゆうき',
        ],
        [
            'grade' => '4',
            'name' => 'もなが',
            'name_read' => 'Kaoruko Tomonaga',
            'kana_name_read' => 'ともながかおるこ',
        ],
        [
            'grade' => '4',
            'name' => 'ももちゃん',
            'name_read' => 'Momo Nagata',
            'kana_name_read' => 'ながたもも',
        ],
        [
            'grade' => '4',
            'name' => 'たない',
            'name_read' => 'Ryunosuke Tanai',
            'kana_name_read' => 'たないりゅうのすけ',
        ],
        [
            'grade' => '4',
            'name' => 'ざき',
            'name_read' => 'Yutaro Yamazaki',
            'kana_name_read' => 'やまざきゆうたろう',
        ],
        [
            'grade' => '4',
            'name' => 'レオ',
            'name_read' => 'Leo Hirano',
            'kana_name_read' => 'ひらのれお',
        ],
        [
            'grade' => '3',
            'name' => 'きゃなやん',
            'name_read' => 'Chie Kanaya',
            'kana_name_read' => 'かなやちえ',
        ],
        [
            'grade' => '3',
            'name' => 'デイジー',
            'name_read' => 'Ayano Masumoto',
            'kana_name_read' => 'ますもとあやの',
        ],
        [
            'grade' => '3',
            'name' => 'いのっち',
            'name_read' => 'RYoya Ino',
            'kana_name_read' => 'いのりょうや',
        ],
        [
            'grade' => '3',
            'name' => 'ゆうたろ',
            'name_read' => 'Yutaro Hayashi',
            'kana_name_read' => 'はやしゆうたろう',
        ],
        [
            'grade' => '3',
            'name' => 'ひろ',
            'name_read' => 'Hiro Yagishta',
            'kana_name_read' => 'やぎしたひろ',
        ],
        [
            'grade' => '3',
            'name' => 'カズ',
            'name_read' => 'Kazumasa Hayashi',
            'kana_name_read' => 'はやしかずまさ',
        ],
        [
            'grade' => '3',
            'name' => 'まな',
            'name_read' => 'Mana Matsushita',
            'kana_name_read' => 'まつしたまな',
        ],
        [
            'grade' => '3',
            'name' => 'みなこ',
            'name_read' => 'Minako Satake',
            'kana_name_read' => 'さたけみなこ',
        ],
        [
            'grade' => '3',
            'name' => 'あらき',
            'name_read' => 'Satoru Araki',
            'kana_name_read' => 'あらきさとる',
        ],
        [
            'grade' => '3',
            'name' => 'すだれさま',
            'name_read' => 'Sudare Hirosugi',
            'kana_name_read' => 'ひろすぎすだれ',
        ],
        [
            'grade' => '3',
            'name' => 'あやっほー',
            'name_read' => 'Ayaka Hukunaga',
            'kana_name_read' => 'ふくながあやか',
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
