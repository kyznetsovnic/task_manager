<?php

namespace App\Services;

use App\Dto\CreateTaskDto;
use App\Dto\ListTaskDto;
use App\Dto\TaskDto;
use App\Dto\UpdateTaskDto;
use Illuminate\Http\JsonResponse;

interface TaskServiceInterface
{
    /**
     * @param ListTaskDto $dto
     * @return JsonResponse
     */
    public function getAllTasks(ListTaskDto $dto): JsonResponse;

    /**
     * @param TaskDto $dto
     * @return JsonResponse
     */
    public function getTaskById(TaskDto $dto): JsonResponse;

    /**
     * @param CreateTaskDto $dto
     * @return JsonResponse
     */
    public function createTask(CreateTaskDto $dto): JsonResponse;

    /**
     * @param UpdateTaskDto $dto
     * @return JsonResponse
     */
    public function editTask(UpdateTaskDto $dto): JsonResponse;

    /**
     * @param TaskDto $dto
     * @return JsonResponse
     */
    public function deleteTask(TaskDto $dto): JsonResponse;
}
