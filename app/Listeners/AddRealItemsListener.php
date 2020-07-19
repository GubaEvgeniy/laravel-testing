<?php

namespace App\Listeners;

use App\Entity\Models\WithdrawalItems\WithdrawalItems;
use App\Entity\Models\WithdrawalItems\WithdrawalItemsStatus;
use App\Events\AddRealItemsEvent;

class AddRealItemsListener
{
    public function handle(AddRealItemsEvent $event)
    {
        $withdrawalItems = new WithdrawalItems();

        $withdrawalItems->item_name = $event->getItemName();
        $withdrawalItems->receiver_id = $event->getUser()->id;
        $withdrawalItems->comment = $event->getComment();
        $withdrawalItems->status = WithdrawalItemsStatus::STATUS_OPEN;

        $withdrawalItems->save();
    }
}
