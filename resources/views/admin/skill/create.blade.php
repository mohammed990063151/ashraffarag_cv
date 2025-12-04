@extends('layouts.app')

@section('title', 'إضافة مهارة جديدة')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-plus"></i> إضافة مهارة جديدة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.skill.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المهارة</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" placeholder="مثال: PHP">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="percentage" class="form-label">مستوى الإتقان (%)</label>
                        <div class="d-flex gap-2 align-items-center">
                            <input type="range" class="form-range" id="percentage" name="percentage" 
                                   min="0" max="100" value="{{ old('percentage', 50) }}" step="5">
                            <input type="number" class="form-control" style="max-width: 60px;" 
                                   id="percentage-display" value="{{ old('percentage', 50) }}" readonly>
                            <span>%</span>
                        </div>
                        @error('percentage')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">الرمز (Icon)</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" name="icon" value="{{ old('icon') }}" placeholder="fa-php">
                        <small class="text-muted">استخدم Font Awesome icons أو Devicons</small>
                        @error('icon')
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
                        <a href="{{ route('admin.skill.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card bg-light">
            <div class="card-body">
                <h6 class="card-title"><i class="fa fa-lightbulb"></i> نصائح</h6>
                <ul class="small">
                    <li>استخدم أيقونات Font Awesome مثل: fa-php, fa-js, fa-database</li>
                    <li>يمكنك استخدم Devicons للغات البرمجة: devicon-php</li>
                    <li>حدد مستوى الإتقان من 0 إلى 100</li>
                    <li>رقم الترتيب يحدد ترتيب عرض المهارات</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('percentage').addEventListener('input', function() {
        document.getElementById('percentage-display').value = this.value;
    });
</script>
@endsection
