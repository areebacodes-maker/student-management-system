<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'batch_id'
    ];

    public function batch()

    {
        return $this->belongsTo(Batch::class);
    }
}
