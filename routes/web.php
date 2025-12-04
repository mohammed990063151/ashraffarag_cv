<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;

Route::get('/', [PortfolioController::class, 'index']);

// ===== Admin Routes =====
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Profile
    Route::get('/profile/edit', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::put('/profile/update', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');

    // Experiences
    Route::get('/experience', [AdminController::class, 'experienceIndex'])->name('admin.experience.index');
    Route::get('/experience/create', [AdminController::class, 'experienceCreate'])->name('admin.experience.create');
    Route::post('/experience', [AdminController::class, 'experienceStore'])->name('admin.experience.store');
    Route::get('/experience/{experience}/edit', [AdminController::class, 'experienceEdit'])->name('admin.experience.edit');
    Route::put('/experience/{experience}', [AdminController::class, 'experienceUpdate'])->name('admin.experience.update');
    Route::delete('/experience/{experience}', [AdminController::class, 'experienceDestroy'])->name('admin.experience.destroy');

    // Skills
    Route::get('/skill', [AdminController::class, 'skillIndex'])->name('admin.skill.index');
    Route::get('/skill/create', [AdminController::class, 'skillCreate'])->name('admin.skill.create');
    Route::post('/skill', [AdminController::class, 'skillStore'])->name('admin.skill.store');
    Route::get('/skill/{skill}/edit', [AdminController::class, 'skillEdit'])->name('admin.skill.edit');
    Route::put('/skill/{skill}', [AdminController::class, 'skillUpdate'])->name('admin.skill.update');
    Route::delete('/skill/{skill}', [AdminController::class, 'skillDestroy'])->name('admin.skill.destroy');

    // Portfolios
    Route::get('/portfolio', [AdminController::class, 'portfolioIndex'])->name('admin.portfolio.index');
    Route::get('/portfolio/create', [AdminController::class, 'portfolioCreate'])->name('admin.portfolio.create');
    Route::post('/portfolio', [AdminController::class, 'portfolioStore'])->name('admin.portfolio.store');
    Route::get('/portfolio/{portfolio}/edit', [AdminController::class, 'portfolioEdit'])->name('admin.portfolio.edit');
    Route::put('/portfolio/{portfolio}', [AdminController::class, 'portfolioUpdate'])->name('admin.portfolio.update');
    Route::delete('/portfolio/{portfolio}', [AdminController::class, 'portfolioDestroy'])->name('admin.portfolio.destroy');

    // Awards
    Route::get('/award', [AdminController::class, 'awardIndex'])->name('admin.award.index');
    Route::get('/award/create', [AdminController::class, 'awardCreate'])->name('admin.award.create');
    Route::post('/award', [AdminController::class, 'awardStore'])->name('admin.award.store');
    Route::get('/award/{award}/edit', [AdminController::class, 'awardEdit'])->name('admin.award.edit');
    Route::put('/award/{award}', [AdminController::class, 'awardUpdate'])->name('admin.award.update');
    Route::delete('/award/{award}', [AdminController::class, 'awardDestroy'])->name('admin.award.destroy');
});

