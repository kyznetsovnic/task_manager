<?php

namespace App\Http\Controllers;

use App\Dto\CreateTaskDto;
use App\Dto\ListTaskDto;
use App\Dto\TaskDto;
use App\Dto\UpdateTaskDto;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Http\Requests\ListTaskRequest;
use App\Services\TaskServiceInterface;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{

    public function __construct(private TaskServiceInterface $taskService)
    {
    }

    /**
     * @param ListTaskRequest $request
     * @return JsonResponse
     */
    public function list(ListTaskRequest $request): JsonResponse
    {
        $taskDto = (new ListTaskDto())
            ->setStatus($request['status'])
            ->setExpiration($request['expiration'])
        ;

        return $this->taskService->getAllTasks($taskDto);
    }


    /**
     * @param CreateTaskRequest $request
     * @return JsonResponse
     */
    public function create(CreateTaskRequest $request): JsonResponse
    {
        $taskDto = (new CreateTaskDto())
            ->setTitle($request['title'])
            ->setDescription($request['description'])
            ->setExpiration($request['expiration'])
        ;

        return $this->taskService->createTask($taskDto);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $taskDto = (new TaskDto())->setId($id);
        return $this->taskService->getTaskById($taskDto);
    }

    /**
     * @param EditTaskRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function edit(EditTaskRequest $request, int $id)
    {
        $taskDto = (new UpdateTaskDto())
            ->setId($id)
            ->setTitle($request['title'])
            ->setDescription($request['description'])
            ->setExpiration($request['expiration'])
            ->setStatus($request['status'])
        ;

        return $this->taskService->editTask($taskDto);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $taskDto = (new TaskDto())->setId($id);
        return $this->taskService->deleteTask($taskDto);
    }
}
