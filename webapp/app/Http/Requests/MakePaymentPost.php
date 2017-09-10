<?php

namespace App\Http\Requests;

use App\Rules\CheckoutActionRule;
use Illuminate\Foundation\Http\FormRequest;

class MakePaymentPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'action' => ['required', 'string', new CheckoutActionRule()],
            'totalAmount' => 'required|numeric',
            'baseAmount' => 'required|numeric',
            'feeAmount' => 'required|numeric',
            'taxAmount' => 'required|numeric',
            'feePercentage' => 'required|numeric',
            'taxPercentage' => 'required|numeric',
        ];
    }

    protected function getValidatorInstance()
    {

        $validator = parent::getValidatorInstance();

        // If the action is not a CHARGE_DEFAULT action, a stripeToken is required
        $validator->sometimes('stripeToken', 'required|string', function ($input) {

            if ($input->action == "CHARGE_DEFAULT") {
                return false;
            } else {
                return true;
            }

        });

        return $validator;

    }


}
