<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Action;
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
        $actions = Action::all();
        return [
            'actions' => $actions,
        ];
    }
}
