<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('order')->get();
        $portfolios = Portfolio::orderBy('order')->get();
        $skills = Skill::orderBy('order')->get();
        $awards = Award::orderBy('order')->get();

        return view('index', compact('profile', 'experiences', 'portfolios', 'skills', 'awards'));
    }
}
