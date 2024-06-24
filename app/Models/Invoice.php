<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'client_name',
        'client_address',
        'items',
        'total_amount',
        'due_date',
        // Add other fields as needed
    ];
}
