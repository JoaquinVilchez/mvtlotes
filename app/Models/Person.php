<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'persons';

    public function lot()
    {
        return $this->hasOne(Lot::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function displayName()
    {
        if ($this->mothers_last_name) {
            $fullName = strtoupper($this->last_name) . ' ' . strtoupper($this->mothers_last_name) . ', ' . $this->first_name;
        } else {
            $fullName = strtoupper($this->last_name) . ', ' . $this->first_name;
        }

        return $fullName;
    }
}
