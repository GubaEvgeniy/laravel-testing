<?php


namespace App\Services\Benefits\BenefitsType\Money;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Benefits\UsersBenefits;
use App\Services\Benefits\BenefitsType\BenefitsTypeInterface;

abstract class MoneyBenefitsAbstract implements BenefitsTypeInterface
{
    public function calculate(Benefits $benefits): int
    {
        $min = $benefits->data['min_range'];
        $max = $benefits->data['max_range'];

        return \rand($min, $max);
    }

    public function add(UsersBenefits $usersBenefits)
    {
        
    }
}
