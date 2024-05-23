<?php

namespace App\Models;

use App\Policies\DirectoryPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Directory extends Model
{
    use HasFactory;

    protected $policies = [
        Directory::class => DirectoryPolicy::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from',
        'to',
        'active',
        'license_id'
    ];

    /**
     * Get LIcense to Directory
     *
     * @return BelongsTo
     */
    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }
}
