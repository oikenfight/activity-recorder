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
        foreach ($this->initVideos() as $initVideo) {
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
            $today = Carbon::today();
            foreach ($actions as $action) {
                $initVideos[] = [
                    'name' => sprintf("init_%s_%s_1.webm", $action->name, $collaborator->name),
                    'action_id' => $action->id,
                    'post_collaborator_id' => $collaborator->id,
                    'act_collaborator_id' => $collaborator->id,
                    'created_at' => $today->addDay(),
                    'updated_at' => $today->addDay(),
                ];
                $initVideos[] = [
                    'name' => sprintf("init_%s_%s_2.webm", $action->name, $collaborator->name),
                    'action_id' => $action->id,
                    'post_collaborator_id' => $collaborator->id,
                    'act_collaborator_id' => $collaborator->id,
                    'created_at' => $today->addDay(),
                    'updated_at' => $today->addDay(),
                ];
            }
        }

        return $initVideos;
    }
}
