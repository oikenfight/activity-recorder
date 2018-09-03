<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ActionController
 * @package App\Http\Controllers\Admin
 */
final class ActionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.actions.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.actions.create');
    }

    public function store()
    {
        return 'admin.actions.store';
    }

    public function show()
    {
        return view('admin.actions.show');
    }

    public function edit()
    {
        return view('admin.actions.edit');
    }

    public function update()
    {
        return 'admin.actions.update';
    }

    public function destroy()
    {
        return 'admin.actions.destroy';
    }
}

