<?php

namespace B4u\TasksModule\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
     * Setter mutator
     *
     * @param $value
     * @return $this
     */
    public function setEndDateAttribute($value)
    {
        try {
            $this->attributes['end_date'] = Carbon::createFromFormat(config('date.date_format'), $value)->format('Y-m-d');
        } catch (\Exception $exception) {
            Log::error('Task save error, wrong date params: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks::error_text')]);
        }
    }

    /**
     *
     * Getter mutator
     *
     * @param $value
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
        } catch (\Exception $exception) {
            Log::error('Task getEndDateAttribute mutator error, wrong date params: ' . $exception->getMessage());
            return $value;
        }
    }


    /**
     *
     * Entity that created task
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function issuer()
    {
        return $this->morphTo();
    }

    /**
     *
     * Entity assigned/responsible for the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function assigned()
    {
        return $this->morphTo();
    }

    /**
     *
     * Entity target of the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function target()
    {
        return $this->morphTo();
    }
}