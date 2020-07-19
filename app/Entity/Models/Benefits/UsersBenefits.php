<?php


namespace App\Entity\Models\Benefits;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Entity\Benefits\UsersBenefits
 *
 * @property int $id
 * @property int $user_id
 * @property int $benefits_id
 * @property mixed $data
 * @property mixed $result
 * @property boolean $used
 * @property User $user
 * @property Benefits $benefit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UsersBenefits newModelQuery()
 * @method static Builder|UsersBenefits newQuery()
 * @method static Builder|UsersBenefits query()
 * @method static Builder|UsersBenefits whereBenefitsId($value)
 * @method static Builder|UsersBenefits whereCreatedAt($value)
 * @method static Builder|UsersBenefits whereData($value)
 * @method static Builder|UsersBenefits whereId($value)
 * @method static Builder|UsersBenefits whereUpdatedAt($value)
 * @method static Builder|UsersBenefits whereUsed($value)
 * @method static Builder|UsersBenefits whereUserId($value)
 * @method static Builder|UsersBenefits unused()
 * @mixin \Eloquent
 * @property Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|UsersBenefits onlyTrashed()
 * @method static Builder|UsersBenefits whereDeletedAt($value)
 * @method static Builder|UsersBenefits whereResult($value)
 * @method static \Illuminate\Database\Query\Builder|UsersBenefits withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UsersBenefits withoutTrashed()
 */
class UsersBenefits extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'benefits_id',
        'data',
        'result',
        'used'
    ];

    protected $casts = [
        'data' => 'array',
        'result' => 'array',
        'used' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefits::class, 'benefits_id');
    }

    public function scopeUnused($query)
    {
        return $query->where('used', '=', false);
    }
}
