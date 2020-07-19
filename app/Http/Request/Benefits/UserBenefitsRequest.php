<?php


namespace App\Http\Request\Benefits;


use App\Http\Request\BaseWebRequest;

class UserBenefitsRequest extends BaseWebRequest
{
    public function rules(): array
    {
        return [
            'benefit_id' => 'required|exists:users_benefits,id'
        ];
    }

    public function getUserBenefitsId(): int
    {
        return $this->request->get('benefit_id');
    }
}
