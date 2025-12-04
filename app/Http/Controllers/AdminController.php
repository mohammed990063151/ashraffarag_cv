<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ===== DASHBOARD =====
    public function dashboard()
    {
        $profile = Profile::first();
        $experiencesCount = Experience::count();
        $skillsCount = Skill::count();
        $portfoliosCount = Portfolio::count();
        $awardsCount = Award::count();

        return view('admin.dashboard', compact('profile', 'experiencesCount', 'skillsCount', 'portfoliosCount', 'awardsCount'));
    }

    // ===== PROFILE =====
    public function profileEdit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'address' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        $profile = Profile::first();

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'تم تحديث البيانات الشخصية بنجاح');
    }

    // ===== EXPERIENCES =====
    public function experienceIndex()
    {
        $experiences = Experience::orderBy('order')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function experienceCreate()
    {
        return view('admin.experience.create');
    }

    public function experienceStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'nullable|boolean',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:10',
            'order' => 'required|integer',
        ]);

        // Convert is_current to boolean
        $validated['is_current'] = $request->has('is_current') ? true : false;

        Experience::create($validated);

        return redirect()->route('admin.experience.index')->with('success', 'تم إضافة الخبرة بنجاح');
    }

    public function experienceEdit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    public function experienceUpdate(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'nullable|boolean',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:10',
            'order' => 'required|integer',
        ]);

        // Convert is_current to boolean
        $validated['is_current'] = $request->has('is_current') ? true : false;

        $experience->update($validated);

        return redirect()->route('admin.experience.index')->with('success', 'تم تحديث الخبرة بنجاح');
    }

    public function experienceDestroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success', 'تم حذف الخبرة بنجاح');
    }

    // ===== SKILLS =====
    public function skillIndex()
    {
        $skills = Skill::orderBy('order')->get();
        return view('admin.skill.index', compact('skills'));
    }

    public function skillCreate()
    {
        return view('admin.skill.create');
    }

    public function skillStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|string|max:50',
            'order' => 'required|integer',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skill.index')->with('success', 'تم إضافة المهارة بنجاح');
    }

    public function skillEdit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    public function skillUpdate(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|string|max:50',
            'order' => 'required|integer',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skill.index')->with('success', 'تم تحديث المهارة بنجاح');
    }

    public function skillDestroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skill.index')->with('success', 'تم حذف المهارة بنجاح');
    }

    // ===== PORTFOLIOS =====
    public function portfolioIndex()
    {
        $portfolios = Portfolio::orderBy('order')->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function portfolioCreate()
    {
        return view('admin.portfolio.create');
    }

    public function portfolioStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'service' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'تم إضافة المشروع بنجاح');
    }

    public function portfolioEdit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function portfolioUpdate(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'service' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'تم تحديث المشروع بنجاح');
    }

    public function portfolioDestroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'تم حذف المشروع بنجاح');
    }

    // ===== AWARDS =====
    public function awardIndex()
    {
        $awards = Award::orderBy('order')->get();
        return view('admin.award.index', compact('awards'));
    }

    public function awardCreate()
    {
        return view('admin.award.create');
    }

    public function awardStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'order' => 'required|integer',
        ]);

        Award::create($validated);

        return redirect()->route('admin.award.index')->with('success', 'تم إضافة الجائزة بنجاح');
    }

    public function awardEdit(Award $award)
    {
        return view('admin.award.edit', compact('award'));
    }

    public function awardUpdate(Request $request, Award $award)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'order' => 'required|integer',
        ]);

        $award->update($validated);

        return redirect()->route('admin.award.index')->with('success', 'تم تحديث الجائزة بنجاح');
    }

    public function awardDestroy(Award $award)
    {
        $award->delete();
        return redirect()->route('admin.award.index')->with('success', 'تم حذف الجائزة بنجاح');
    }
}
