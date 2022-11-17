<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\AdminRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Contracts\Service\Attribute\Required;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function contactView()
    {
        return view('contact');
    }


    public function teamView()
    {
        return view('team');
    }


    public function submit(Request $req)
    {

        $req->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',

            ]
        );

        $name = $req->input('name');
        $email = $req->input('email');
        $message = $req->input('message');
        $contact = compact('name', 'message');
        $adminData = compact('name', 'email', 'message');
        Mail::to($email)->send(new ContactMail($contact));
        Mail::to('admin@presto.it')->send(new AdminRequestMail($adminData));

        return redirect(route('welcome'))->with('sent', __('ui.contactFlash'));
    }
}
