<?php


namespace App\Entity\Providers\Benefits;


use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Users\User;
use Illuminate\Database\Eloquent\Collection;

class UsersBenefitsProvider
{
    public static function getUserBenefitsByUserIdAndId(User $user, int $userBenefitsId): UsersBenefits
    {
        return UsersBenefits::query()
            ->unused()
            ->whereUserId($user->id)
            ->whereId($userBenefitsId)
            ->firstOrFail();
    }

    public static function getUnusedBenefitsByType(string $benefitType): Collection
    {
        return UsersBenefits::query()
            ->unused()
            ->whereHas('benefit', function ($query) use ($benefitType) {
                return $query->where('type', '=', $benefitType);
            })
            ->get();
    }
}
