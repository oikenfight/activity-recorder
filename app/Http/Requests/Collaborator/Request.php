<?php
declare(strict_types=1);

namespace App\Http\Requests\Collaborator;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'collaborator.grade' => [
                'required',
                'int',
                'min:1',
                'max:7',
            ],
            'collaborator.name' => [
                'required',
                'min:2',
                'max:128',
                'alpha_dash'
            ],
            'collaborator.name_read' => [
                'required',
                'alpha',
                'min:2',
                'max:128',
            ],
            'collaborator.kana_name_read' => [
                'required',
                'min:2',
                'max:128',
            ],
        ];
    }
}
