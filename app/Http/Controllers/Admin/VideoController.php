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
        $videos = Video::paginate(20);

        return view('admin.videos.index', [
            'videos' => $videos,
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
                    ->get();
                break;
            default:
                redirect()->route('admin.video.index');
        }

        // dd($items);

        return view('admin.videos.index-by', [
            'items' => $items,
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
