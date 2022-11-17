<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->get();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', __('ui.message1'));
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message',__('ui.message2'));
    }

    public function restoreAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(null);
        return redirect()->back()->with('message',__('ui.message3'));
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message',__('ui.message4'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message',__('ui.message5'));
    }

    public function deletedAnnouncement()
    {
        $announcement_to_restore = Announcement::where('is_accepted', false)->get();
        return view('revisor.deleted', compact('announcement_to_restore'));
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->category()->disassociate();
        $announcement->user()->disassociate();
        $announcement->delete();
        return redirect()->back()->with('message',__('ui.message6'));
    }
}
