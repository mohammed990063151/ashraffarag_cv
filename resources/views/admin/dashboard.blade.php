@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h3><i class="fa fa-dashboard"></i> مرحباً في لوحة التحكم</h3>
        <p class="text-muted">أدر محتوى موقعك الشخصي من هنا</p>
    </div>
</div>

@if($profile)
<div class="row mb-4">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="fa fa-user-circle"></i> <strong>مرحباً {{ $profile->first_name }} {{ $profile->last_name }}!</strong>
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-primary ms-2">تعديل البيانات الشخصية</a>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-primary text-uppercase mb-1 small font-weight-bold">الخبرات</div>
                <div class="h3 mb-0"><i class="fa fa-briefcase"></i> {{ $experiencesCount }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-success text-uppercase mb-1 small font-weight-bold">المهارات</div>
                <div class="h3 mb-0"><i class="fa fa-star"></i> {{ $skillsCount }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-info text-uppercase mb-1 small font-weight-bold">المشاريع</div>
                <div class="h3 mb-0"><i class="fa fa-folder"></i> {{ $portfoliosCount }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-warning text-uppercase mb-1 small font-weight-bold">الجوائز</div>
                <div class="h3 mb-0"><i class="fa fa-trophy"></i> {{ $awardsCount }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <a href="{{ route('admin.contact.index') }}" class="text-decoration-none text-reset">
            <div class="card border-left-secondary shadow h-100 py-2 dashboard-stat-link">
                <div class="card-body">
                    <div class="text-secondary text-uppercase mb-1 small font-weight-bold">رسائل التواصل</div>
                    <div class="h3 mb-0"><i class="fa fa-envelope text-secondary"></i> {{ $contactMessagesCount }}</div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="mb-0"><i class="fa fa-star text-warning"></i> المهارات</h5>
                <a href="{{ route('admin.skill.index') }}" class="btn btn-sm btn-outline-primary">إدارة المهارات</a>
            </div>
            <div class="card-body">
                @if($skills->isEmpty())
                    <p class="text-muted mb-0">لا توجد مهارات بعد. <a href="{{ route('admin.skill.create') }}">أضف مهارة</a></p>
                @else
                    <div class="row g-3">
                        @foreach($skills as $skill)
                            <div class="col-md-6 col-xl-4">
                                <div class="d-flex align-items-center p-3 rounded border bg-light h-100">
                                    <div class="flex-shrink-0 me-3 text-primary" style="font-size: 1.5rem;">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="fw-semibold text-truncate">{{ $skill->name }}</div>
                                        <div class="progress mt-2" style="height: 8px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->percentage }}%" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted">{{ $skill->percentage }}%</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="fa fa-bolt"></i> الإجراءات السريعة</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fa fa-user"></i> تعديل البيانات الشخصية
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.experience.create') }}" class="btn btn-success w-100 mb-2">
                            <i class="fa fa-plus"></i> إضافة خبرة جديدة
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.skill.create') }}" class="btn btn-info w-100 mb-2">
                            <i class="fa fa-plus"></i> إضافة مهارة جديدة
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-warning w-100 mb-2">
                            <i class="fa fa-plus"></i> إضافة مشروع جديد
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.award.create') }}" class="btn btn-secondary w-100 mb-2">
                            <i class="fa fa-plus"></i> إضافة جائزة جديدة
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="fa fa-envelope"></i> عرض رسائل التواصل
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-left-primary {
        border-left: 0.25rem solid #3498db !important;
    }
    .border-left-success {
        border-left: 0.25rem solid #27ae60 !important;
    }
    .border-left-info {
        border-left: 0.25rem solid #2980b9 !important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f39c12 !important;
    }
    .border-left-secondary {
        border-left: 0.25rem solid #6c757d !important;
    }
    .dashboard-stat-link .card {
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .dashboard-stat-link:hover .card {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.12) !important;
    }
    .card-body .text-primary {
        color: #3498db !important;
    }
    .card-body .text-success {
        color: #27ae60 !important;
    }
    .card-body .text-info {
        color: #2980b9 !important;
    }
    .card-body .text-warning {
        color: #f39c12 !important;
    }
</style>
@endsection
