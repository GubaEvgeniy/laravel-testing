<?php


namespace App\Services\Benefits;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Benefits\UsersBenefitsProvider;
use App\Services\Benefits\BenefitsType\BenefitsTypeInterface;
use Illuminate\Database\Eloquent\Collection;

class BenefitsServices
{
    public function getBenefitForUser(User $user): UsersBenefits
    {
        $activeBenefits = Benefits::all();

        $benefit = $this->getRandomBenefit($activeBenefits);

        $benefitClassName = BenefitsTypeInterface::MAPPING_BENEFITS[$benefit->type];
        /** @var BenefitsTypeInterface $benefitClass */
        $benefitClass = new $benefitClassName();

        $userBenefits = new UsersBenefits();
        $userBenefits->user_id = $user->id;
        $userBenefits->benefits_id = $benefit->id;
        $userBenefits->data = $benefit->data;
        $userBenefits->result = $benefitClass->calculate($benefit);

        $userBenefits->save();

        return $userBenefits;
    }

    public function refuse(User $user, int $userBenefitsId)
    {
        UsersBenefitsProvider::getUserBenefitsByUserIdAndId($user, $userBenefitsId)->delete();
    }

    public function accept(User $user, int $userBenefitsId)
    {
        $userBenefit = UsersBenefitsProvider::getUserBenefitsByUserIdAndId($user, $userBenefitsId);

        $benefitClassName = BenefitsTypeInterface::MAPPING_BENEFITS[$userBenefit->benefit->type];
        /** @var BenefitsTypeInterface $benefitClass */
        $benefitClass = new $benefitClassName();
        $benefitClass->add($userBenefit);

        $userBenefit->used = true;
        $userBenefit->save();
    }

    private function getRandomBenefit(Collection $benefits): Benefits
    {
        return $benefits->random();
    }
}
