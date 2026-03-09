<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(Task::class);
    }

}
