<?php

namespace  B4u\TasksModule\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tasks
 *
 * Model entity for Tasks.
 *
 * @package B4u\TasksModule\Models
 */
class Tasks extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'description',
        'issuer_id',
        'issuer_type',
        'assigned_id',
        'assigned_type',
        'end_date',
    ];

    /**
     * @var string
     */
    protected $table = 'tasks';
}