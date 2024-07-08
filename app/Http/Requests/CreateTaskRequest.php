<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTaskRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules()
    {
        $required = $this->method() === 'POST' ? 'required|' : '';
        return [
            'title' => sprintf('%sstring', $required),
            'description' => sprintf('%sstring', $required),
            'expiration' => sprintf('%sdate_format:Y-m-d', $required),
            'status' => [Rule::in([Task::TASK_NEW, Task::TASK_IN_PROCESS, Task::TASK_CLOSED])],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status' => sprintf(
                'Status can be one of (%s - new, %s - in process, %s - closed)',
                Task::TASK_NEW, Task::TASK_IN_PROCESS, Task::TASK_CLOSED
            ),
        ];
    }
}
