<?php


namespace App\Entity\Models\Billing;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Entity\Models\Billing\Transactions
 *
 * @property int $id
 * @property int $wallet_id
 * @property string $billing_transactions_type
 * @property string $comment
 * @property float $balance_before
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Transactions newModelQuery()
 * @method static Builder|Transactions newQuery()
 * @method static Builder|Transactions query()
 * @method static Builder|Transactions whereBalanceBefore($value)
 * @method static Builder|Transactions whereBillingTransactionsType($value)
 * @method static Builder|Transactions whereComment($value)
 * @method static Builder|Transactions whereCreatedAt($value)
 * @method static Builder|Transactions whereId($value)
 * @method static Builder|Transactions whereUpdatedAt($value)
 * @method static Builder|Transactions whereWalletId($value)
 * @mixin \Eloquent
 */
class Transactions extends Model
{
    protected $table = 'billing_transactions';
}
