<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Action;
use App\Entities\Collaborator;
use App\Entities\Video;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * Class VideoController
 * @package App\Http\Controllers\Api
 */
final class VideoController extends Controller
{
    public function upload(Request $request)
    {
        // TODO: 取得した webm ファイルを mp4 ファイルに変換して保存 or そのまま保存

        $blob = $request->file('blob');

        $input = $request->only(['action_id', 'post_collaborator_id', 'act_collaborator_id']);

        try {
            /** @var Action $action */
            $action = Action::query()->findOrFail($input['action_id']);
            /** @var Collaborator $postCollaborator */
            $postCollaborator = Collaborator::query()->findOrFail($input['post_collaborator_id']);
            /** @var Collaborator $actCollaborator */
            $actCollaborator = Collaborator::query()->findOrFail($input['act_collaborator_id']);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'result' => 'ng',
                'message' => $exception->getMessage(),
            ], 500);
        }

        $maxVideoId = Video::query()->orderByDesc('id')->first()->id;
        $filename = 'ID' . sprintf('%04d', $maxVideoId + 1) . '_' . $action->name;
        $savePath = 'public/actions/' . $action->name;

        // 動画（webm）を保存
        Storage::putFileAs(
            $savePath, $blob, $filename . '.webm'
        );

        Video::query()->insert([
            'name' => $filename,
            'action_id' => $action->id,
            'post_collaborator_id' => $postCollaborator->id,
            'act_collaborator_id' => $actCollaborator->id,
        ]);

        return response()->json([
            'result' => 'ok',
        ], 200);
    }
}
