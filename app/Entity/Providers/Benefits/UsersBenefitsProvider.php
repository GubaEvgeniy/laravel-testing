<?php


namespace App\Entity\Providers\Benefits;


use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Users\User;

class UsersBenefitsProvider
{
    public static function getUserBenefitsByUserIdAndId(User $user, int $userBenefitsId): UsersBenefits
    {
        return UsersBenefits::query()
            ->whereUserId($user->id)
            ->whereId($userBenefitsId)
            ->firstOrFail();
    }
}
