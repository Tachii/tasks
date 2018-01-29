<?php

namespace  B4u\Tasks;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'name', 'end_date'
    ];
}