<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ActionsController
 * @package App\Http\Controllers\Api
 */
final class ActionsController extends Controller
{
    /**
     * @return array
     */
    public function all()
    {
        // TODO: get from database
        $actions = [
            ['id' => 0, 'name' => 'name0'],
            ['id' => 1, 'name' => 'name1'],
            ['id' => 2, 'name' => 'name2'],
            ['id' => 3, 'name' => 'name3'],
        ];

        return [
            'actions' => $actions,
        ];
    }
}
