<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $fillable = ['batch_name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
