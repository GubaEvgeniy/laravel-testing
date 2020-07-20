<?php


namespace App\Entity\Models\Billing;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Models\Billing\TransactionsTypes
 *
 * @property string $type
 * @property string|null $description
 * @method static Builder|TransactionsTypes newModelQuery()
 * @method static Builder|TransactionsTypes newQuery()
 * @method static Builder|TransactionsTypes query()
 * @method static Builder|TransactionsTypes whereDescription($value)
 * @method static Builder|TransactionsTypes whereType($value)
 * @mixin \Eloquent
 */
class TransactionsTypes extends Model
{
    const TYPE_ADD = 'add';
    const TYPE_CHARGE = 'charge';

    protected $table = 'billing_transactions_types';

    public $timestamps = false;

    protected $fillable = [
        'type',
        'description'
    ];
}
