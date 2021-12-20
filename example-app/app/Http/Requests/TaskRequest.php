<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|min:16',
            'type' => 'required',
            'status'=>'required',
            'start_date'=>'required',
            'due_date'=>'required',
            'assignee'=> 'required',
            'estimate'=>'required',
            'actual'=>'required',
        ];
    }
    public function message()
    {
        return [
            'required'=>':attribute is required!',
            'min'=>':attribute must be at least :min characters.',
        ];
    }
}