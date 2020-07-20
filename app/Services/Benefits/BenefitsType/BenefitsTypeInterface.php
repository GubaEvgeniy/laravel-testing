<?php


namespace App\Services\Benefits\BenefitsType;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Benefits\UsersBenefits;
use App\Services\Benefits\BenefitsType\Items\RealItem;
use App\Services\Benefits\BenefitsType\Money\BonusMoney;
use App\Services\Benefits\BenefitsType\Money\RealMoney;

interface BenefitsTypeInterface
{
    const MAPPING_BENEFITS = [
        BonusMoney::TYPE => BonusMoney::class,
        RealMoney::TYPE => RealMoney::class,
        RealItem::TYPE => RealItem::class
    ];

    public function calculate(Benefits $benefits);

    public function add(UsersBenefits $usersBenefits);
}
