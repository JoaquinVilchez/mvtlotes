<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'results';

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }
}
