<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file_id',
        'Lenses_type',
        'degree',
        'client',
        'glasses_type',
        'phone',
        'status',
        'the_rest',
        'paid_up',
        'price',
        'comments',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
    
}
