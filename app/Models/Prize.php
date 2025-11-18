<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    /** @use HasFactory<\Database\Factories\PrizeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'campaign_id',
        'name',
        'description',
        'type',
        'prize_type',
        'cash_value',
        'winning_number',
        'position',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'cash_value' => 'decimal:2',
        ];
    }

    /**
     * Get the campaign that owns the prize.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
