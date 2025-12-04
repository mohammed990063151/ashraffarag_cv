@extends('layouts.app')

@section('title', 'تعديل الجائزة')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-edit"></i> تعديل الجائزة/الشهادة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.award.update', $award) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">اسم الجائزة/الشهادة</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $award->title) }}" placeholder="مثال: شهادة في تطوير الويب">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" placeholder="وصف الجائزة أو الشهادة">{{ old('description', $award->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">تاريخ البداية</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" value="{{ old('start_date', $award->start_date->format('Y-m-d')) }}">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">تاريخ النهاية (اختياري)</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" value="{{ old('end_date', $award->end_date ? $award->end_date->format('Y-m-d') : '') }}">
                                <small class="text-muted">اتركها فارغة إذا كانت الشهادة مستمرة</small>
                                @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">ترتيب العرض</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                               id="order" name="order" value="{{ old('order', $award->order) }}" min="1">
                        @error('order')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('admin.award.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
