<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'supply_date',
        'customer_name',
        'address',
        'TaxNumber',
        'responsible',
        'phone',
        'email',
        'Bank_name',
        'account_name',
        'account_number',
        'IBAN',
        'user_id',
        'contracts_id'
    ];
    use HasFactory;
}
