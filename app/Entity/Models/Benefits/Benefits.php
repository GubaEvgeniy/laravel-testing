<?php


namespace App\Entity\Models\Benefits;


use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Entity\Benefits\Benefits
 *
 * @property int $id
 * @property string $type
 * @property mixed $data
 * @property int $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Benefits newModelQuery()
 * @method static Builder|Benefits newQuery()
 * @method static Builder|Benefits query()
 * @method static Builder|Benefits whereActive($value)
 * @method static Builder|Benefits whereCreatedAt($value)
 * @method static Builder|Benefits whereData($value)
 * @method static Builder|Benefits whereId($value)
 * @method static Builder|Benefits whereType($value)
 * @method static Builder|Benefits whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Benefits extends Model
{
    protected $fillable = ['type', 'data', 'active'];

    protected $casts = [
        'data' => 'array'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope());
    }
}
