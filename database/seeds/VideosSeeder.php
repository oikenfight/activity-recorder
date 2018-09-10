<?php
declare(strict_types=1);

use App\Entities\Action;
use App\Entities\Collaborator;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class VideosSeeder
 */
final class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();

        foreach ($this->initVideos() as $i => $initVideo) {
            $today = Carbon::today()->subDay($i % 5);
            $initVideo['created_at'] = $today;
            $initVideo['updated_at'] = $today;
            DB::table('videos')->insert($initVideo);
        }
    }

    /**
     * @return array
     */
    protected function initVideos()
    {
        $initVideos = [];

        $collaborators = Collaborator::all();
        $actions = Action::all();

        foreach ($collaborators as $collaborator) {
            foreach ($actions as $action) {
                $initVideos[] = [
                    'name' => sprintf("init_%s_%s_1.webm", $action->name, $collaborator->name),
                    'action_id' => $action->id,
                    'post_collaborator_id' => $collaborator->id,
                    'act_collaborator_id' => $collaborator->id,
                ];
                $initVideos[] = [
                    'name' => sprintf("init_%s_%s_2.webm", $action->name, $collaborator->name),
                    'action_id' => $action->id,
                    'post_collaborator_id' => $collaborator->id,
                    'act_collaborator_id' => $collaborator->id,
                ];
            }
        }

        return $initVideos;
    }
}
