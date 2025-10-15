<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'comment'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
