<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class NotificationComponent extends Component
{
    public function markNotification($request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    // public function show($id)
    // {
    //     $notification = auth()->user()->notifications()->where('id', $id)->first();

    //     if ($notification) {
    //         $notification->markAsRead();
    //         return redirect($notification->data['link']);
    //     }
    // }
    public function readnoti()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
    public function render()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('livewire.notification-component',[
            'notifications' => $notifications,
        ]);
    }
}
