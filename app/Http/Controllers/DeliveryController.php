<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Recipient method for all SMS messages
     * - DeliveredToTerminal : Message has been delivered
     *  - UserNotExist : Number does not exist
     *  - Insufficient_Balance : Insufficient funds at user end
     *  - DeliveryImpossible : Expired messages
     *  - sender_ID blacklisted by user
     *  - Invalid_Linkid : Incorrect link ID
     *  - DeliveredNotificationNotSupported : Notification not supported
     */
    public function receive(Request $request): JsonResponse
    {
        //identifies message first
        $messageId = $request->input('message_id');
        $phoneNumber = $request->input('phone_number');
        $status = $request->input('status');

        $messageLog = SmsLog::where('phoneNumber', $phoneNumber)
            ->where('messageId', $messageId)
            ->first();

       // dd($messageLog);
        if ($messageLog) {
            $messageLog->deliveryStatus = $status;
            $messageLog->update();
        }
        return response()->json(['success' => 'success'], 200);
    }
}
