<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    /**
     * @return Collection
     */
    public function findByStatusAndExpiration(int $status, string $expiration): Collection;

    /**
     * @return Collection
     */
    public function findByStatus(int $status): Collection;

    /**
     * @return Collection
     */
    public function findByExpiration(string $expiration): Collection;

    /**
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task;

    /**
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool;

    /**
     * @return Collection
     */
    public function all(): Collection;
}
