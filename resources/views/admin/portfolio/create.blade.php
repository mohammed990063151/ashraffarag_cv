@extends('layouts.app')

@section('title', 'إضافة مشروع جديد')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-plus"></i> إضافة مشروع جديد</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان المشروع</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" placeholder="مثال: موقع إلكتروني تجاري">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" placeholder="وصف تفصيلي للمشروع">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">الفئة</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                       id="category" name="category" value="{{ old('category') }}" placeholder="مثال: Web Design">
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="service" class="form-label">نوع الخدمة</label>
                                <input type="text" class="form-control @error('service') is-invalid @enderror" 
                                       id="service" name="service" value="{{ old('service') }}" placeholder="مثال: Web Development">
                                @error('service')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="client" class="form-label">اسم العميل</label>
                                <input type="text" class="form-control @error('client') is-invalid @enderror" 
                                       id="client" name="client" value="{{ old('client') }}" placeholder="اسم الشركة أو العميل">
                                @error('client')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="project_date" class="form-label">تاريخ المشروع</label>
                                <input type="date" class="form-control @error('project_date') is-invalid @enderror" 
                                       id="project_date" name="project_date" value="{{ old('project_date') }}">
                                @error('project_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">صورة المشروع</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <small class="text-muted">اختر صورة للمشروع (أفضل حجم: 500x300)</small>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">ترتيب العرض</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                               id="order" name="order" value="{{ old('order', 1) }}" min="1">
                        @error('order')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> حفظ
                        </button>
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
