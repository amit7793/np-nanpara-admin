<?php

namespace App\Services;

use App\Models\Complains;
use App\Models\Notification;
use App\Models\ComplainMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class complainservice
{

    public function ComplainsSave($request, $user_id)
    {
        try {
            $complains = [
                'user_id' => $user_id,
                'name' => $request['name'],
                'mobile_number' => $request['mobile_number'],
                'email_id' => $request['email_id'],
                'complain' => $request['complain'],
            ];
            $complainsData = Complains::create($complains);
            return $complainsData;
        } catch (\Exception $e) {
            Log::error('Error creating complains: ' . $e->getMessage());
            throw new \Exception('Failed to create complains');
        }
    }

    public function Complainsmessage($request, $user_id)
    {
        try {
            $adminId = Auth::id();
            // dd($adminId);
            $array = array('sender' => $user_id, 'message' => $request->message);
            $data = Complains::where('id', $request->id)->first();
            $complains = [
                'complain_id' => (int)$request->id,
                'user_id' => $data->user_id,
                'send' => $user_id,
                'message' => $request->message,
                'received' => $data->user_id,
            ];
            $complainsData = ComplainMessage::create($complains);
            if ($complainsData) {
                $data = [
                    'send' => $adminId,
                    'notification' => "Admin has responded '{$request->message}' to your complaint with ID:{$request->id}",
                    'received' => $data->user_id,
                    'mark_as_read' => '0'
                ];

                Notification::create($data);
            }
            return $complainsData;
        } catch (\Exception $e) {
            Log::error('Error creating complains: ' . $e->getMessage());
            throw new \Exception('Failed to create complains');
        }
    }
}
