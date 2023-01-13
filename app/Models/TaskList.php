<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    use HasFactory;
    protected $table = 'lists';

    protected $fillable = [
        'list',
        'user_id',
        'desc'
    ];

    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }
}
