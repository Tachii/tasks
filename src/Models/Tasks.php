<?php

namespace  B4u\TasksModule\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'name', 'end_date'
    ];
}