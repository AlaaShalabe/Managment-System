<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'Lenses_type',
        'degree',
        'client',
        'glasses_type',
        'status',
        'the_rest',
        'paid_up',
        'price',
        'comments',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
