<?php


namespace App\Entity\Models\WithdrawalItems;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Entity\Models\WithdrawalItems\WithdrawalItems
 *
 * @property int $id
 * @property string $item_name
 * @property int $receiver_id Receiver of the al item
 * @property string $comment
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|WithdrawalItems newModelQuery()
 * @method static Builder|WithdrawalItems newQuery()
 * @method static Builder|WithdrawalItems query()
 * @method static Builder|WithdrawalItems whereComment($value)
 * @method static Builder|WithdrawalItems whereCreatedAt($value)
 * @method static Builder|WithdrawalItems whereId($value)
 * @method static Builder|WithdrawalItems whereItemName($value)
 * @method static Builder|WithdrawalItems whereReceiverId($value)
 * @method static Builder|WithdrawalItems whereStatus($value)
 * @method static Builder|WithdrawalItems whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WithdrawalItems extends Model
{

}
