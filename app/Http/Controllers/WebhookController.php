<?php

namespace App\Http\Controllers;

use App\Enums\AccountType;
use App\Models\UserAccount;
use App\Services\DailyTicketProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebhookController extends Controller
{

    public function monnifyTransactionWebHook(Request $request, DailyTicketProcessor $dailyTicketProcessor)
    {

        $DEFAULT_MERCHANT_CLIENT_SECRET = get_monnify_secret_key();

        $data = json_encode($request->all());

        $computedHash = $this->computeSHA512TransactionHash($data, $DEFAULT_MERCHANT_CLIENT_SECRET);

        if ($request->eventType == 'SUCCESSFUL_TRANSACTION') {

            DB::beginTransaction();

            try {
                
                $reference = $request->eventData['product']['reference'];

                //amount paid to the merchant
                $amount = $request->eventData['amountPaid'];

                //fetch user by his reference
                $account = UserAccount::where('account_reference', $reference)->first();

                //fund the user account
                $account->user->deposit($amount);

                if ($account->user && ($account->user->account_type == AccountType::INDIVIDUAL)) {

                    $dailyTicketProcessor->makeDailyPayment($account->user);
                }

                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                save_mailer_log($e, 'WEBHOOK_SUCCESSFUL_TRANSACTION_LOG');
            }
        }
    }

    public function computeSHA512TransactionHash($stringifiedData, $clientSecret)
    {
        $computedHash = hash_hmac('sha512', $stringifiedData, $clientSecret);
        return $computedHash;
    }
}
