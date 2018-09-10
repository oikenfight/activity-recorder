<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Entities\Action;
use App\Entities\Collaborator;
use App\Entities\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Class VideoController
 * @package App\Http\Controllers\Admin
 */
final class VideoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $params = $request->query();

        $targetAction = null;
        $targetCollaborator = null;

        $query = Video::query();

        if (isset($params['action'])) {
            $targetAction = DB::table('actions')->find($params['action']);
            $query->where('action_id', $params['action']);
        } else if (isset($params['collaborator'])) {
            $targetCollaborator = DB::table('collaborators')->find($params['collaborator']);
            $query->orWhere('post_collaborator_id', $params['collaborator'])
            ->orWhere('post_collaborator_id', $params['collaborator']);
        } else if (isset($params['post_collaborator'])) {
            $targetCollaborator = DB::table('collaborators')->find($params['post_collaborator']);
            $query->where('post_collaborator_id', $params['post_collaborator']);
        } else if (isset($params['post_collaborator'])) {
            $targetCollaborator = DB::table('collaborators')->find($params['act_collaborator']);
            $query->where('act_collaborator_id', $params['act_collaborator']);
        } else if (isset($params['date'])) {
            $query->whereDate('created_at', $params['date']);
        }

        $videos = $query->paginate(30);

        $selectableQuery = [
            'all' => '全て',
            'action' => 'アクション',
            'collaborator' => '協力者',
            'date' => '日',
        ];

        return view('admin.videos.index', [
            'videos' => $videos,
            'targetAction' => $targetAction,
            'targetCollaborator' => $targetCollaborator,
            'selectableQuery' => $selectableQuery,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBy(Request $request)
    {
        $query = $request->query('by');

        switch ($query) {
            case 'action':
                $items = Action::all();
                foreach ($items as $item) {
                    $item['video_num'] = count($item->videos);
                }
                break;
            case 'collaborator':
                $items = Collaborator::all();
                foreach ($items as $item) {
                    $item['post_video_num'] = count($item->postVideos()->where('post_collaborator_id', $item->id)->get());
                    $item['act_video_num'] = count($item->actVideos()->where('act_collaborator_id', $item->id)->get());
                }
                break;
            case 'date':
                $items = DB::table('videos')
                    ->select(DB::raw('date(created_at) AS date'), DB::raw('count(*) as video_num'))
                    ->groupBy('created_at', DB::raw('date'))
                    ->orderBy('created_at', 'DESC')
                    ->get();
                break;
            default:
                redirect()->route('admin.video.index');
        }

        $selectableQuery = [
            'all' => '全て',
            'action' => 'アクション',
            'collaborator' => '協力者',
            'date' => '日',
        ];

        return view('admin.videos.index-by', [
            'items' => $items,
            'selectableQuery' => $selectableQuery,
        ]);
    }

    public function indexByCollaborator()
    {
        return view('admin.videos.index-by-collaborator');
    }

    public function indexByDate()
    {
        return view('admin.videos.index-by-date');
    }

    public function show()
    {
        return view('admin.videos.show');
    }

    public function edit()
    {
        return view('admin.videos.edit');
    }

    public function update()
    {
        return 'update';
    }

    public function destroy()
    {
        return 'destroy';
    }
}
