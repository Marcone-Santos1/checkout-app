<?php

namespace MiniRest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use MiniRest\Traits\HasUuid;

class Product extends Model
{
    use HasUuid, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'external_id',
        'unit_value'
    ];

    protected $hidden = [
        'id',
        'deleted_at'
    ];

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }
}