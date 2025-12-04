@extends('layouts.app')

@section('title', 'إدارة الخبرات')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-briefcase"></i> الخبرات</h5>
                <a href="{{ route('admin.experience.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> إضافة خبرة جديدة
                </a>
            </div>
            <div class="card-body">
                @if($experiences->isEmpty())
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> لا توجد خبرات مسجلة حالياً
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>المسمى الوظيفي</th>
                                    <th>الشركة</th>
                                    <th>التاريخ</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($experiences as $key => $experience)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $experience->title }}</strong></td>
                                        <td>{{ $experience->company }}</td>
                                        <td>
                                            {{ $experience->start_date->format('Y-m-d') }}
                                            @if(!$experience->is_current)
                                                إلى {{ $experience->end_date->format('Y-m-d') }}
                                            @else
                                                <span class="badge bg-success">حالي</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($experience->is_current)
                                                <span class="badge bg-success">نشط</span>
                                            @else
                                                <span class="badge bg-secondary">منتهي</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.experience.edit', $experience) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.experience.destroy', $experience) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('هل متأكد من الحذف؟')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
