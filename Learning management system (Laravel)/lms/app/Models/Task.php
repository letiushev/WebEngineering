<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'points'];

    public function subject()
    {
        return $this -> belongsTo(Subjects::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
