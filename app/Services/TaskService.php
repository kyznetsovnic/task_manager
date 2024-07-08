<?php

namespace App\Services;

use App\Dto\CreateTaskDto;
use App\Dto\ListTaskDto;
use App\Dto\TaskDto;
use App\Dto\UpdateTaskDto;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TaskService implements TaskServiceInterface
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
    }

    /**
     * @param ListTaskDto $dto
     * @return JsonResponse
     */
    public function getAllTasks(ListTaskDto $dto): JsonResponse
    {
        $tasks = match (true) {
            null !== $dto->getStatus() && null !== $dto->getExpiration() => $this->taskRepository->findByStatusAndExpiration($dto->getStatus(), $dto->getExpiration()),
            null !== $dto->getStatus() => $this->taskRepository->findByStatus($dto->getStatus()),
            null !== $dto->getExpiration() => $this->taskRepository->findByExpiration($dto->getExpiration()),
            default => $this->taskRepository->all()
        };

        if ($tasks->count()) {
            return response()->json(['success' => true, 'tasks' => TaskResource::collection($tasks)]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tasks were not found'
        ], 404);
    }

    /**
     * @param TaskDto $dto
     * @return JsonResponse
     */
    public function getTaskById(TaskDto $dto): JsonResponse
    {
        if ($task = $this->taskRepository->findById($dto->getId())) {
            return response()->json(['success' => true, 'task' => new TaskResource($task)]);
        }

        return response()->json([
            'success' => false,
            'message' => sprintf('Task with id %d does not exist', $dto->getId())
        ], 404);
    }

    /**
     * @param CreateTaskDto $dto
     * @return JsonResponse
     */
    public function createTask(CreateTaskDto $dto): JsonResponse
    {
        $task = Task::create([
            'title' => $dto->getTitle(),
            'description' => $dto->getDescription(),
            'expiration_at' => $dto->getExpiration(),
            'status' => Task::TASK_NEW
        ]);

        return response()->json(['success' => true, 'task' => new TaskResource($task)]);
    }

    /**
     * @param UpdateTaskDto $dto
     * @return JsonResponse
     */
    public function editTask(UpdateTaskDto $dto): JsonResponse
    {
        if ($task = $this->taskRepository->findById($dto->getId())) {
            $task->update([
                'title' => $dto->getTitle() ?? $task->title,
                'description' => $dto->getDescription() ?? $task->description,
                'expiration_at' => $dto->getExpiration() ?? $task->expiration_at,
                'status' => $dto->getStatus() ?? $task->status
            ]);

            return response()->json(['success' => true, 'task' => new TaskResource($task)], 201);
        }

        return response()->json([
            'success' => false,
            'message' => sprintf('Task with id %d does not exist', $dto->getId())
        ], 404);
    }

    /**
     * @param TaskDto $dto
     * @return JsonResponse
     */
    public function deleteTask(TaskDto $dto): JsonResponse
    {
        if ($task = $this->taskRepository->findById($dto->getId())) {
            $isDeleted = $this->taskRepository->delete($task);

            return response()->json([
                'success' => $isDeleted,
                'message' => sprintf('Task with id %d was successfully deleted', $dto->getId())
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => sprintf('Task with id %d does not exist', $dto->getId())
        ], 404);
    }
}
