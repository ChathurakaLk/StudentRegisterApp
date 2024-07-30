<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
    ];

        /**
     * Get all of the payments for the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(payment::class, 'student_id', 'id');
    }

    //status function
    public function GetStatus(){
        return ($this->status) == 1 ? 'Active' : 'Inactive';
    }
    public function GetTotalPayments(){
       return number_format($this->payments->sum('amount', 2));
    }
}
