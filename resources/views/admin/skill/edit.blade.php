@extends('layouts.app')

@section('title', 'تعديل المهارة')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa fa-edit"></i> تعديل المهارة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.skill.update', $skill) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المهارة</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $skill->name) }}" placeholder="مثال: PHP">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="percentage" class="form-label">مستوى الإتقان (%)</label>
                        <div class="d-flex gap-2 align-items-center">
                            <input type="range" class="form-range" id="percentage" name="percentage" 
                                   min="0" max="100" value="{{ old('percentage', $skill->percentage) }}" step="5">
                            <input type="number" class="form-control" style="max-width: 60px;" 
                                   id="percentage-display" value="{{ old('percentage', $skill->percentage) }}" readonly>
                            <span>%</span>
                        </div>
                        @error('percentage')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">الرمز (Icon)</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" name="icon" value="{{ old('icon', $skill->icon) }}" placeholder="fa-php">
                        <small class="text-muted">استخدم Font Awesome icons أو Devicons</small>
                        @error('icon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">ترتيب العرض</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                               id="order" name="order" value="{{ old('order', $skill->order) }}" min="1">
                        @error('order')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> حفظ التغييرات
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
                <h6 class="card-title"><i class="fa fa-info-circle"></i> معلومات</h6>
                @if($skill->icon)
                    <p>الرمز الحالي: <i class="fa {{ $skill->icon }} fa-2x"></i></p>
                @endif
                <div class="progress" style="height: 30px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $skill->percentage }}%">
                        {{ $skill->percentage }}%
                    </div>
                </div>
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
