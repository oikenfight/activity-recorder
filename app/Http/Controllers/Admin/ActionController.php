<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Entities\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Action\Request as ActionRequest;

/**
 * Class ActionController
 * @package App\Http\Controllers\Admin
 */
final class ActionController extends Controller
{
    // TODO: Controller から直接データブチ込む感じ汚いけど、まあ楽だから仕方ない。。余裕あったら直す。

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $actions = Action::all();
        return view('admin.actions.index', [
            'actions' => $actions,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.actions.create');
    }

    /**
     * @param ActionRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ActionRequest $request)
    {
        $inputs = $request->only([
            'action.name',
            'action.japanese_name'
        ]);
        $action = Action::create([
            'name' => $inputs['action']['name'],
            'japanese_name' => $inputs['action']['japanese_name'],
        ]);
        return redirect()->route('admin.action.index')->with('success', '作成しました。');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $actionId = $request->route('Action');
        try {
            $action = Action::find($actionId);
        } catch (\Exception $e) {
            return redirect()->route('admin.action.index')->with('error', '見つかりませんでした。');
        }
        return view('admin.actions.show', [
            'action' => $action,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $actionId = $request->route('Action');
        try {
            $action = Action::find($actionId);
        } catch (\Exception $e) {
            return redirect()->route('admin.action.index')->with('error', '見つかりませんでした。');
        }
        return view('admin.actions.edit', [
            'action' => $action,
        ]);
    }

    /**
     * @param ActionRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ActionRequest $request)
    {
        $actionId = $request->route('Action');
        try {
            $action = Action::find($actionId);
        } catch (\Exception $e) {
            return redirect()->route('admin.action.index')->with('error', '見つかりませんでした。');
        }
        $inputs = $request->only([
            'action.name',
            'action.japanese_name'
        ]);
        $action->update([
            'name' => $inputs['action']['name'],
            'japanese_name' => $inputs['action']['japanese_name'],
        ]);
        return redirect()->route('admin.action.index')->with('success', '更新しました。');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $actionId = $request->route('Action');
        try {
            $action = Action::find($actionId);
        } catch (\Exception $e) {
            return redirect()->route('admin.action.index')->with('error', '見つかりませんでした。');
        }
        $action->delete();
        return redirect()->route('admin.action.index')->with('success', '削除しました。');
    }
}

