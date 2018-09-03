<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
final class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        return 'admin.users.store';
    }

    public function show()
    {
        return view('admin.users.show');
    }

    public function edit()
    {
        return view('admin.users.edit');
    }

    public function update()
    {
        return 'admin.users.update';
    }

    public function destroy()
    {
        return 'admin.users.destroy';
    }
}
