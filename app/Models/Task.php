<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @package App\Models
 * @property int    $id
 * @property string $title
 * @property string $description
 * @property int    $status
 * @property string $expiration_at
 * @property string $created_at
 * @property string $updated_at
 */
class Task extends Model
{
    use HasFactory;

    public const TASK_NEW = 1;
    public const TASK_IN_PROCESS = 2;
    public const TASK_CLOSED = 3;

    protected $fillable = ['title', 'description', 'status', 'expiration_at'];
}
