@extends('layouts.app')

@section('title', 'تعديل البيانات الشخصية')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-user"></i> تعديل البيانات الشخصية</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">الاسم الأول</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       id="first_name" name="first_name" value="{{ old('first_name', $profile->first_name ?? '') }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">الاسم الأخير</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       id="last_name" name="last_name" value="{{ old('last_name', $profile->last_name ?? '') }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">المسمى الوظيفي</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $profile->title ?? '') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">النبذة الشخصية</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror"
                                  id="bio" name="bio" rows="4">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $profile->email ?? '') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">العنوان</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                       id="address" name="address" value="{{ old('address', $profile->address ?? '') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">المدينة</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" value="{{ old('location', $profile->location ?? '') }}">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="github_url" class="form-label">رابط GitHub</label>
                                <input type="url" class="form-control @error('github_url') is-invalid @enderror"
                                       id="github_url" name="github_url" value="{{ old('github_url', $profile->github_url ?? '') }}">
                                @error('github_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="linkedin_url" class="form-label">رابط LinkedIn</label>
                                <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                       id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url ?? '') }}">
                                @error('linkedin_url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="profile_image" class="form-label">صورة البروفايل</label>
                        <input type="file" class="form-control @error('profile_image') is-invalid @enderror"
                               id="profile_image" name="profile_image" accept="image/*">
                        @if($profile->profile_image)
                            <small class="d-block mt-2">الصورة الحالية: <img src="{{ asset('storage/' . $profile->profile_image) }}" style="max-width: 100px; border-radius: 5px;"></small>
                        @endif
                        @error('profile_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="twitter_url" class="form-label">رابط Twitter</label>
                        <input type="url" class="form-control @error('twitter_url') is-invalid @enderror"
                               id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url ?? '') }}">
                        @error('twitter_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
