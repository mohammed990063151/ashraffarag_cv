@extends('layouts.app')

@section('title', 'إضافة خبرة جديدة')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-plus"></i> إضافة خبرة جديدة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.experience.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">المسمى الوظيفي</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" placeholder="مثال: مهندس ويب">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="company" class="form-label">اسم الشركة</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" 
                               id="company" name="company" value="{{ old('company') }}" placeholder="اسم الشركة">
                        @error('company')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" placeholder="وصف مختصر للخبرة">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">تاريخ البداية</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">تاريخ النهاية</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_current">
                                هذا العمل حالي (مستمر)
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="icon" class="form-label">الرمز (Icon)</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                       id="icon" name="icon" value="{{ old('icon') }}" placeholder="fa-briefcase">
                                <small class="text-muted">استخدم Font Awesome icons</small>
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="color" class="form-label">اللون</label>
                                <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" 
                                       id="color" name="color" value="{{ old('color', '#3498db') }}">
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> حفظ
                        </button>
                        <a href="{{ route('admin.experience.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
