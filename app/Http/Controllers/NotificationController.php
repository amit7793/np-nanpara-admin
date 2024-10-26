<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function notification()
    {
       $notification_data =  Notification::where('mark_as_read','0')->OrderBy('id', 'DESC')->where('received',8)->get();
       foreach($notification_data as $notification_data_list)
       {
                $data = [
                    'mark_as_read' => '1'
                ];
                Notification::where('id',$notification_data_list->id)->update($data);
       }
       return view('notification', compact('notification_data'));
    }
}
