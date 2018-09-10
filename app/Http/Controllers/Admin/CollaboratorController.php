<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Entities\Collaborator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collaborator\Request as CollaboratorRequest;

/**
 * Class CollaboratorController
 * @package App\Http\Controllers\Admin
 */
final class CollaboratorController extends Controller
{
    // TODO: Controller から直接データブチ込む感じ汚いけど、まあ楽だから仕方ない。。余裕あったら直す。

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $collaborators = Collaborator::all();
        return view('admin.collaborators.index', [
            'collaborators' => $collaborators,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.collaborators.create');
    }

    /**
     * @param CollaboratorRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CollaboratorRequest $request)
    {
        $inputs = $request->only([
            'collaborator.grade',
            'collaborator.name',
            'collaborator.name_read',
            'collaborator.kana_name_read',
        ]);
        $collaborator = Collaborator::create([
            'grade' => $inputs['collaborator']['grade'],
            'name' => $inputs['collaborator']['name'],
            'name_read' => $inputs['collaborator']['name_read'],
            'kana_name_read' => $inputs['collaborator']['kana_name_read'],
        ]);
        return redirect()->route('admin.collaborator.index')->with('success', '作成しました。');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $collaboratorId = $request->route('Collaborator');
        try {
            $collaborator = Collaborator::find($collaboratorId);
        } catch (\Exception $e) {
            return redirect()->route('admin.collaborator.index')->with('error', '見つかりませんでした。');
        }
        return view('admin.collaborators.show', [
            'collaborator' => $collaborator,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $collaboratorId = $request->route('Collaborator');
        try {
            $collaborator = Collaborator::find($collaboratorId);
        } catch (\Exception $e) {
            return redirect()->route('admin.collaborator.index')->with('error', '見つかりませんでした。');
        }
        return view('admin.collaborators.edit', [
            'collaborator' => $collaborator,
        ]);
    }

    /**
     * @param CollaboratorRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CollaboratorRequest $request)
    {
        $collaboratorId = $request->route('Collaborator');
        try {
            $collaborator = Collaborator::find($collaboratorId);
        } catch (\Exception $e) {
            return redirect()->route('admin.collaborator.index')->with('error', '見つかりませんでした。');
        }
        $inputs = $request->only([
            'collaborator.grade',
            'collaborator.name',
            'collaborator.name_read',
            'collaborator.kana_name_read',
        ]);
        $collaborator->update([
            'grade' => $inputs['collaborator']['grade'],
            'name' => $inputs['collaborator']['name'],
            'name_read' => $inputs['collaborator']['name_read'],
            'kana_name_read' => $inputs['collaborator']['kana_name_read'],
        ]);
        return redirect()->route('admin.collaborator.index')->with('success', '更新しました。');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $collaboratorId = $request->route('Collaborator');
        try {
            $collaborator = Collaborator::find($collaboratorId);
        } catch (\Exception $e) {
            return redirect()->route('admin.collaborator.index')->with('error', '見つかりませんでした。');
        }
        $collaborator->delete();
        return redirect()->route('admin.collaborator.index')->with('success', '削除しました。');
    }
}

