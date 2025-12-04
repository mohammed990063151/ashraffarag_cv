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
                        <a href="{{ route('admin.award.create') }}" class="btn btn-secondary w-100">
                            <i class="fa fa-plus"></i> إضافة جائزة جديدة
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
