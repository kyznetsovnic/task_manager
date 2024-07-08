<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @param int $status
     * @param string $expiration
     * @return Collection
     */
    public function findByStatusAndExpiration(int $status, string $expiration): Collection
    {
        return Task::where(['status' => $status, 'expiration_at' => $expiration])->get();
    }

    /**
     * @param int $status
     * @return Collection
     */
    public function findByStatus(int $status): Collection
    {
        return Task::where('status',  $status)->get();
    }

    /**
     * @param string $expiration
     * @return Collection
     */
    public function findByExpiration(string $expiration): Collection
    {
        return Task::where('expiration_at', '=', $expiration)->get();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Task::all();
    }

    /**
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task
    {
        return Task::find($id);
    }

    /**
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
