<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('front.user.pages.dashboard');
    }
    public function add_listing()
    {
        return view('front.user.pages.add-listing');
    }
    public function booking()
    {
        return view('front.user.pages.booking');
    }
    public function bookmark()
    {
        return view('front.user.pages.bookmark');
    }
    public function change_password()
    {
        return view('front.user.pages.change-password');
    }
    public function collection_add()
    {
        return view('front.user.pages.collection-add');
    }
    public function edit_profile()
    {
        return view('front.user.pages.edit-profile');
    }

    public function messages()
    {
        return view('front.user.pages.messages');
    }
    public function my_listing()
    {
        return view('front.user.pages.my-listing');
    }
    public function loyality()
    {
        return view('front.user.pages.loyality');
    }
    public function profile()
    {
        return view('front.user.pages.profile');
    }

    public function reviews()
    {
        return view('front.user.pages.reviews');
    }
    public function service_history()
    {
        return view('front.user.pages.service-history');
    }
    public function setting_app()
    {
        return view('front.user.pages.setting-app');
    }
    public function wallet()
    {
        return view('front.user.pages.wallet');
    }
    public function wishlist()
    {
        return view('front.user.pages.wishlist');
    }
}
