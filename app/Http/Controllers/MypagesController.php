<?php

namespace App\Http\Controllers;

use App\Service\SQLService;
use Illuminate\Support\Facades\Auth;

class MypagesController extends Controller
{
    protected $SQLService;

    public function __construct(SQLService $SQLService)
    {
        $this->SQLService = $SQLService;
    }

    public function show()
    {
        if(Auth::check()){
            $profile = $this->SQLService->getUserProfile();
            $course = $this->SQLService->getUserCourse();

            return view('mypage.detail', compact('profile', 'course'));
        }else{
            return redirect()->route('user_login');
        }
    }

    public function edit()
    {
        return view('mypage.detail');
    }

    public function show_user()
    {
        return view('mypage.detail_other');
    }

    public function follow()
    {
        return view('mypage.follow');
    }

    public function follower()
    {
        return view('mypage.follower');
    }
    public function chat()
    {
          return view('mypage.chat');
    }
}
