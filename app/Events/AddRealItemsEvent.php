<?php

namespace App\Events;

use App\Entity\Models\Users\User;

class AddRealItemsEvent extends Event
{
    /**
     * @var User
     */
    private User $user;
    private string $itemName;
    private string $comment;

    public function __construct(User $user, string $itemName, string $comment = '')
    {
        $this->itemName = $itemName;
        $this->user = $user;
        $this->comment = $comment;
    }

    public function getItemName(): string
    {
        return $this->itemName;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
