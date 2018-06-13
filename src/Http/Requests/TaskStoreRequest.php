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
    public function authorize(): bool
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
            'issuer_id' => 'nullable|integer',
            'issuer_type' => 'nullable|string|max:500',
            'assigned_id' => 'nullable|integer',
            'assigned_type' => 'nullable|string|max:500',
            'target_id' => 'nullable|integer',
            'target_type' => 'nullable|string|max:500',
        ];
    }
}
