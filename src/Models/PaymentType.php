<?php

namespace MiniRest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use MiniRest\Traits\HasUuid;

class PaymentType extends Model
{
    use HasUuid, SoftDeletes;

    protected $table = 'payment_types';

    protected $fillable = [
        'type',
        'external_id'
    ];

    protected $hidden = [
        'id',
        'deleted_at'
    ];

    public function sales(): belongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}