<?php


namespace App\Entity\Models\Billing;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Models\Billing\Wallets

 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Wallets whereAmount($value)
 * @method static Builder|Wallets whereCreatedAt($value)
 * @method static Builder|Wallets whereId($value)
 * @method static Builder|Wallets whereType($value)
 * @method static Builder|Wallets whereUpdatedAt($value)
 * @method static Builder|Wallets whereUserId($value)
 * @method static Builder|Wallets newModelQuery()
 * @method static Builder|Wallets newQuery()
 * @method static Builder|Wallets query()
 */
class Wallets extends Model
{
    protected $table = 'billing_wallets';

    const TYPE_BONUS_MONEY = 'bonus_money';
    const TYPE_REAL_MONEY = 'real_money';
}
