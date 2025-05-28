<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date_of_birth',
        'biography',
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    /**
     * Get the movies for the actor.
     */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}