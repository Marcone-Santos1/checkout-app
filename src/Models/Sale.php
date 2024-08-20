<?php

namespace MiniRest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use MiniRest\Traits\HasUuid;

class Sale extends Model
{
    use HasUuid, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'external_id'
    ];

    protected $hidden = [
        'id',
        'deleted_at'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function paymentType(): hasOne
    {
        return $this->hasOne(PaymentType::class);
    }
}