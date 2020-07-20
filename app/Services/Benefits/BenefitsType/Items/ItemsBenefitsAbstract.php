<?php


namespace App\Services\Benefits\BenefitsType\Items;


use App\Entity\Models\Benefits\Benefits;
use App\Entity\Models\Benefits\UsersBenefits;
use App\Events\AddRealItemsEvent;
use App\Services\Benefits\BenefitsType\BenefitsTypeInterface;

abstract class ItemsBenefitsAbstract implements BenefitsTypeInterface
{
    public function calculate(Benefits $benefits): string
    {
        $items = $benefits->data['items'];

        return $items[\array_rand($items)];
    }

    public function add(UsersBenefits $usersBenefits)
    {
        event(
            new AddRealItemsEvent(
                $usersBenefits->user,
                $usersBenefits->result,
                'from raffle prizes'
            )
        );

        $usersBenefits->used = true;
        $usersBenefits->save();
    }
}
