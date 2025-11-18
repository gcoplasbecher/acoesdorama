<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'total_numbers',
        'min_first_purchase',
        'max_per_purchase',
        'price_per_number',
        'draw_date',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'draw_date' => 'date',
            'price_per_number' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the prizes for the campaign.
     */
    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    /**
     * Get the tickets for the campaign.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the images for the campaign.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
