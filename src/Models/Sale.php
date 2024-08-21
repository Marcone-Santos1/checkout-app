<?php

namespace MiniRest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use MiniRest\Traits\HasUuid;

class Sale extends Model
{
    use HasUuid, SoftDeletes;

    protected $table = 'sales';

    protected $fillable = [
        'external_id',
        'amount_paid',
        'payment_id',
        'unit_value'
    ];

    protected $hidden = [
        'id',
        'deleted_at'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount', 'unit_value');
    }

    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class, 'payment_id');
    }
}