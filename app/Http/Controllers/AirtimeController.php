<?php

namespace App\Http\Controllers;

use App\Console\encription;
use App\Mail\Emailtrans;
use App\Models\bill;
use App\Models\Comission;
use App\Models\data;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AirtimeController
{

    public function buyairtime(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'amount'=>'required',
            'number'=>['required', 'numeric',  'digits:11'],
            'refid'=>'required',
        ]);

        $user = User::find($request->user()->id);
        $wallet = wallet::where('username', $user->username)->first();
        if ($wallet->balance < $request->amount) {
            $mg = "You Cant Make Purchase Above" . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
            return response()->json( $mg, Response::HTTP_BAD_REQUEST);

        }
        if ($request->amount < 0) {

            $mg = "error transaction";
            return response()->json($mg, Response::HTTP_BAD_REQUEST);
        }
        $bo = bill::where('transactionid', $request->refid)->first();
        if (isset($bo)) {
            $mg = "duplicate transaction, kindly reload this page";
            return response()->json( $mg, Response::HTTP_CONFLICT);


        } else {

            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();
            $per=2/100;
            $comission=$per*$request->amount;

            $fbalance=$wallet->balance;

            $gt = $wallet->balance - $request->amount;
            $wallet->balance = $gt;
            $wallet->save();

                    $bo = bill::create([
                        'username' => $user->username,
                        'product' => $request->id.'Airtime',
                        'amount' => $request->amount,
                        'server_response' => 0,
                        'status' => 0,
                        'number' => $request->number,
                        'paymentmethod'=>'wallet',
                        'transactionid' => $request->refid,
                        'discountamount' => 0,
                        'fbalance'=>$fbalance,
                        'balance'=>$gt,
                    ]);

                    $transaction=transaction::create([
                        'username'=>$user->username,
                        'activities'=>'Being Purchase Of Airtime to '.$request->number,
                    ]);

                    $comiS=Comission::create([
                        'username'=>Auth::user()->username,
                        'amount'=>$comission,
                    ]);
                    $bo['name']=$user->name;
                    $bo['email']=Auth::user()->email;

                    $resellerURL = 'https://integration.mcd.5starcompany.com.ng/api/reseller/';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL =>$resellerURL.'pay',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_SSL_VERIFYHOST => 0,
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('service' => 'airtime', 'coded' => $request->id, 'phone' => $request->number, 'amount' => $request->amount, 'reseller_price' => $request->amount),

                        CURLOPT_HTTPHEADER => array(
                            'Authorization: mcd_key_aq9vGp2N8679cX3uAU7zIc3jQfd'
                        )));

                    $response = curl_exec($curl);

                    curl_close($curl);
//                    return $response;
                    $data = json_decode($response, true);
                    $success = $data["success"];
                    if ($success == 1) {

                        $update=bill::where('id', $bo->id)->update([
                            'server_response'=>$response,
                            'status'=>1,
                        ]);
                        $am = "NGN $request->amount  Airtime Purchase Was Successful To";
                        $ph = $request->number;

                        $com=$wallet->bonus+$comission;
                        $wallet->bonus=$com;
                        $wallet->save();

                        $parise=$comission."₦ Commission Is added to your wallet balance";
                        $receiver = $user->email;
                        $admin = 'info@efemobilemoney.com';


                        Mail::to($receiver)->send(new Emailtrans($bo));
                        Mail::to($admin)->send(new Emailtrans($bo));
                        return response()->json([
                            'status' => 'success',
                            'message' => $am.' ' .$ph.' & '.$parise,
//                            'data' => $responseData // If you want to include additional data
                        ]);
                    } elseif ($success == 0) {

                        $am = "Contact your Admin";
                        $ph = ", Transaction fail";

//                        Alert::error('error', $am.' ' .$ph);
//                        return redirect()->route('viewpdf', $bo->id);

                        return response()->json([
                            'status' => 'fail',
                            'message' => $response,
//                            'message' => $am.' ' .$ph,
//                            'data' => $responseData // If you want to include additional data
                        ]);
                    }
                }

            }
}
