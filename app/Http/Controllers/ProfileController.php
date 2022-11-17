<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $rules = [
        'firstName' => 'required|alpha',
        'lastName' => 'required|alpha',
        'address' => 'required',
        'city' => 'required',
        'country' => 'required|alpha',
        'zipCode' => 'required',
    ];

    public function userProfileCreate()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required|alpha',
            'zipCode' => 'required',
        ]);

        if ($request->file('img')) {
            $profile = Auth::user()->profile()->create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
                'zipCode' => $request->zipCode,
                'img' => $request->file('img')->store('public/profile_img'),
            ]);
        } else {
            $profile = Auth::user()->profile()->create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
                'zipCode' => $request->zipCode,
                'img' => null
            ]);
        }

        session()->flash('message', __('ui.messageProfile'));
        $this->cleanForm();
        return redirect(route('profile.edit'));
    }

    public function cleanForm()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->address = '';
        $this->phone = '';
        $this->city = '';
        $this->country = '';
        $this->zipCode = '';
    }

    public function userProfileEdit()
    {
        $profile = Auth::user()->profile()->first();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $rules = $request->validate([
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required|alpha',
            'zipCode' => 'required',
        ]);

        $profile = Auth::user()->profile()->first();

        $profile->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zipCode' => $request->zipCode,
        ]);

        if ($request->file('img')) {
            $profile->update([
                'img' => $request->file('img')->store('public/profile_img')
            ]);
        }
        session()->flash('message', __('ui.messageProfileEdit'));
        return redirect(route('profile.edit'));
    }
}
