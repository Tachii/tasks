<?php

namespace B4u\TasksModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'descriptions' => 'required|string|max:500',
            'assigned_id' => 'required|integer',
            'assigned_type' => 'required|string|max:500',
            'end_date' => 'required|date',
        ];
    }
}
