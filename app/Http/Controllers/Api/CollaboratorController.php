<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entities\Collaborator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CollaboratorController
 *
 * @package App\Http\Controllers\Api
 */
final class CollaboratorController extends Controller
{
    /**
     * @return array
     */
    public function all()
    {
        $collaborators = Collaborator::all();
        return [
            'collaborators' => $collaborators,
        ];
    }

    /**
     * @return array
     */
    public function grades()
    {
        $collaborators = Collaborator::all();
        $items = $collaborators->pluck('grade')->unique()->sort();
        $grades = [];
        foreach ($items as $item) {
            $grade['grade'] = $item;
            switch ($item) {
                case 1:
                    $grade['name'] = '1';
                    break;
                case 2:
                    $grade['name'] = '2';
                    break;
                case 3:
                    $grade['name'] = '3';
                    break;
                case 4:
                    $grade['name'] = '4';
                    break;
                case 5:
                    $grade['name'] = 'M1';
                    break;
                case 6:
                    $grade['name'] = 'M2';
                    break;
                case 7:
                    $grade['name'] = 'その他';
                    break;
            }
            $grades[] = $grade;
        }
        return [
            'grades' => $grades,
        ];
    }
}
