<?php


namespace Tests\Feature\Benefits;


use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use App\Events\Billing\AddBonusMoneyEvent;
use App\Events\Billing\AddRealMoneyEvent;
use App\Services\Benefits\BenefitsServices;
use App\Services\Benefits\BenefitsType\BenefitsTypeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GetBenefitTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function getBenefitWithUnauthenticated()
    {
        $response = $this->post('/benefits');

        $response
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    /**
     * @test
     */
    public function getBenefitWithUser()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        \Auth::login($user);

        $response = $this->post(route('benefits.calculate'));

        $response
            ->assertStatus(200)
            ->assertSee('Сongratulations!');

        $userBenefits = UsersBenefits::query()->whereUserId($user->id)->get();

        $this->assertInstanceOf(Collection::class, $userBenefits);

        /** @var UsersBenefits $userBenefit */
        $userBenefit = $userBenefits->first();
        $this->assertInstanceOf(UsersBenefits::class, $userBenefit);
        $this->assertEquals($user->id, $userBenefit->user->id);
        $this->assertFalse($userBenefit->used);
        $this->assertContains($userBenefit->benefit->type, \array_keys(BenefitsTypeInterface::MAPPING_BENEFITS));
    }

    /**
     * @test
     */
    public function refuseBenefitWithUser()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        \Auth::login($user);
        $benefitsServices = new BenefitsServices();
        $userBenefits = $benefitsServices->getBenefitForUser($user);

        $response = $this->post(route('benefits.refuse'), [
            'benefit_id' => $userBenefits->id
        ]);

        $response
            ->assertRedirect(route('home'));

        $userBenefit = UsersBenefits::query()->find($userBenefits->id);
        $this->assertNull($userBenefit);
    }

    /**
     *
     */
    public function acceptBenefitWithUser()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        \Auth::login($user);
        $benefitsServices = new BenefitsServices();
        $userBenefits = $benefitsServices->getBenefitForUser($user);

        $response = $this->post(route('benefits.accept'), [
            'benefit_id' => $userBenefits->id
        ]);

        $response
            ->assertRedirect(route('home'));

        $userBenefit = UsersBenefits::query()->find($userBenefits->id);
        $this->assertTrue($userBenefit->used);
    }



}
