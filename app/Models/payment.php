<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'amount',
    ];

    /**
     * Get the student that owns the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
}
