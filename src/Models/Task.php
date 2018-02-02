<?php

namespace B4u\TasksModule\Models;

use Carbon\Carbon;
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
        'end_date',
    ];

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @param $value
     * @return $this
     */
    public function setEndDateAttribute($value)
    {
        try {
            $this->attributes['end_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
        } catch (\Exception $exception) {
            Log::error('Task save error, wrong date params: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks::error_text')]);
        }
    }

    public function getEndDateAttribute($value)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
        } catch (\Exception $exception) {
            Log::error('Task getEndDateAttribute mutator error, wrong date params: ' . $exception->getMessage());
            return $value;
        }

    }
}