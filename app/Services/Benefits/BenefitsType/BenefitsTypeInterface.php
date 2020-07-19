<?php


namespace App\Services\Benefits\BenefitsType;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Benefits\UsersBenefits;
use App\Services\Benefits\BenefitsType\Items\RealItem;
use App\Services\Benefits\BenefitsType\Money\BonusMoneyAbstract;
use App\Services\Benefits\BenefitsType\Money\RealMoneyAbstract;

interface BenefitsTypeInterface
{
    const MAPPING_BENEFITS = [
        BonusMoneyAbstract::TYPE => BonusMoneyAbstract::class,
        RealMoneyAbstract::TYPE => RealMoneyAbstract::class,
        RealItem::TYPE => RealItem::class
    ];

    public function calculate(Benefits $benefits);

    public function add(UsersBenefits $usersBenefits);
}
