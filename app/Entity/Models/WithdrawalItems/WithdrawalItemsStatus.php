<?php


namespace App\Entity\Models\WithdrawalItems;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Models\WithdrawalItems\WithdrawalItemsStatus
 *
 * @property string $status
 * @property string|null $description
 * @method static Builder|WithdrawalItemsStatus newModelQuery()
 * @method static Builder|WithdrawalItemsStatus newQuery()
 * @method static Builder|WithdrawalItemsStatus query()
 * @method static Builder|WithdrawalItemsStatus whereDescription($value)
 * @method static Builder|WithdrawalItemsStatus whereStatus($value)
 * @mixin \Eloquent
 */
class WithdrawalItemsStatus extends Model
{
    public $timestamps = false;

    const STATUS_OPEN = 'open';
    const STATUS_IN_PROGRESS = 'in_process';
    const STATUS_COMPLETED = 'completed';
    const STATUS_DECLINED = 'declined';

    protected $fillable = [
        'status',
        'description'
    ];
}
