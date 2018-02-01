<?php

namespace B4u\TasksModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TaskStoreRequest
 *
 * Used for request validation.
 *
 * @package B4u\TasksModule\Http\Requests
 */
class TaskStoreRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'description' => 'required|string|max:500',
            'issuer_id' => 'required|integer',
            'issuer_type' => 'required|string|max:500',
            'assigned_id' => 'required|integer',
            'assigned_type' => 'required|string|max:500',
            'end_date' => 'required|date',
        ];
    }
}
