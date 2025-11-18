<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'purchase_id',
        'payment_gateway',
        'gateway_payment_id',
        'status',
        'amount',
        'pix_qr_code',
        'pix_qr_code_base64',
        'pix_copy_paste',
        'expires_at',
        'gateway_response',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'expires_at' => 'datetime',
            'gateway_response' => 'array',
        ];
    }

    /**
     * Get the purchase that owns the payment.
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
