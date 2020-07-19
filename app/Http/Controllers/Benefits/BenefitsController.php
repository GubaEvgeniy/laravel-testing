<?php


namespace App\Http\Controllers\Benefits;


use App\Entity\Models\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Request\Benefits\UserBenefitsRequest;
use App\Services\Benefits\BenefitsServices;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BenefitsController extends Controller
{
    public function calculate(BenefitsServices $benefitsServices)
    {
        /** @var User $user */
        $user = Auth::user();

        $userBenefit = $benefitsServices->getBenefitForUser($user);

        return view('benefits.' . $userBenefit->benefit->type,
            [
                'benefit' => $userBenefit
            ]
        );
    }

    public function accept(UserBenefitsRequest $request, BenefitsServices $benefitsServices)
    {
        /** @var User $user */
        $user = Auth::user();
        $userBenefitsId = $request->getUserBenefitsId();

        $benefitsServices->accept($user, $userBenefitsId);
    }

    public function refuse(UserBenefitsRequest $request, BenefitsServices $benefitsServices)
    {
        /** @var User $user */
        $user = Auth::user();
        $userBenefitsId = $request->getUserBenefitsId();

        try {
            $benefitsServices->refuse($user, $userBenefitsId);

            return redirect()->route('home')->with('info', 'You refused the gift');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'This user cannot use gift');
        }
    }
}
