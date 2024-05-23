<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserLicense extends Model
{
    use HasFactory;

    protected $with = [
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * Get all of the tags for the post.
     */
    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }

    /**
     * Get all of the tags for the post.
     */
    public function directories(): HasMany
    {
        return $this->hasMany(Directory::class, 'license_id', 'license_id');
    }

    /**
     * Get all of the tags for the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
