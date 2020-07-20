<?php


namespace App\Entity\Models\Billing;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Entity\Models\Billing\BillingSettings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|BillingSettings newModelQuery()
 * @method static Builder|BillingSettings newQuery()
 * @method static Builder|BillingSettings query()
 * @method static Builder|BillingSettings whereCreatedAt($value)
 * @method static Builder|BillingSettings whereDescription($value)
 * @method static Builder|BillingSettings whereId($value)
 * @method static Builder|BillingSettings whereKey($value)
 * @method static Builder|BillingSettings whereUpdatedAt($value)
 * @method static Builder|BillingSettings whereValue($value)
 * @mixin \Eloquent
 */
class BillingSettings extends Model
{
    const CONVERSION_FEE = 'conversion_fee';

    protected $table = 'billing_setting';

    protected $fillable = [
        'key',
        'value',
        'description'
    ];
}
