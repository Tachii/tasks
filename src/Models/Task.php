<?php

namespace B4u\TasksModule\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Task
 *
 * Model entity for Task.
 *
 * @package B4u\TasksModule\Models
 */
class Task extends Model
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
        'target_id',
        'target_type',
        'end_date',
    ];
    /**
     * @var string
     */
    protected $table = 'tasks';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('updated_at_desc', function (Builder $builder) {
            $builder->orderBy('updated_at', 'desc');
        });
    }

    /**
     *
     * Entity that created task
     *
     * @return MorphTo
     */
    public function issuer(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     *
     * Entity assigned/responsible for the task
     *
     * @return MorphTo
     */
    public function assigned(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     *
     * Entity target of the task
     *
     * @return MorphTo
     */
    public function target(): MorphTo
    {
        return $this->morphTo();
    }
}