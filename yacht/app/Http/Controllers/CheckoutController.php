<?php

namespace App\Http\Controllers;

use App\Models\HistoryPayment;
use App\Models\Leases;
use Carbon\Carbon;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Facade\FlareClient\Http\Exceptions\MissingParameter;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;
use Stripe\StripeClient;
use Stripe\Token;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        $leases = Leases::where('id', $id)->first();
        return view('pages.checkout.checkout')->with(['leases' => $leases]);
    }

    public function payment($id, Request $request)
    {
        $leases = Leases::where('id', $id)->first();

       /* $validator = Validator::make($request->all(), [
            'number_card' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvv' => 'required|numeric',
        ]);
        if ($validator->passes()) {*/
            $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->card_number,
                        'exp_month' => $request->exp_month,
                        'exp_year' => $request->exp_year,
                        'cvc' => $request->cvc,
                    ]]);
                if (!isset($token['id'])) {
                    return Redirect::to('checkout/'.$leases->id);
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $request->amount,
                    'description' => 'wallet',
                ]);
                if ($charge){
                    $status = 1;
                }else{
                    $status= 0;
                }
                $data = array(
                    'payment_id'=>$charge['id'],
                    'customer_id'=>$leases->rent_registrations->customer_id,
                    'payment_total'=>$leases->leases_price,
                    'payment_status'=>$status,
                    'create_at'=>Carbon::now(),
                );
                HistoryPayment::insert($data);

                //ínsert
                if ($charge['status'] == 'succeeded') {
                    Session::put('success','You have successfully paid');

                    return view('pages.checkout.checkout')->with(['leases' => $leases]);
                } else {
                    return \redirect()->route('checkout')->with(['error' => 'Money not add in wallet!', 'leases' => $leases]);
                }
            } catch (Exception $e) {
                return Redirect::to('checkout/'.$leases->id)->with(['error' => $e->getMessage(), 'leases' => $leases]);
            } catch (CardErrorException $e) {
                return Redirect::to('checkout/'.$leases->id)->with(['error' => $e->getMessage(), 'leases' => $leases]);
            } catch (MissingParameter $e) {
                return Redirect::to('checkout/'.$leases->id)->with(['error' => $e->getMessage(), 'leases' => $leases]);
            }

        }
//    }
}
