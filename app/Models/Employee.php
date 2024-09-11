<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'departement_id',
        'hired_at',
        'profile_pict_link'
    ];

    /**
     * Get the departement this employee belongs to
     */
    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class,'departement_id');
    }
}
