@extends('layouts.app')

@section('title', 'إدارة المشاريع')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-folder"></i> المشاريع</h5>
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> إضافة مشروع جديد
                </a>
            </div>
            <div class="card-body">
                @if($portfolios->isEmpty())
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> لا توجد مشاريع مسجلة حالياً
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>المشروع</th>
                                    <th>الفئة</th>
                                    <th>التاريخ</th>
                                    <th>الخدمة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $key => $portfolio)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $portfolio->title }}</strong></td>
                                        <td><span class="badge bg-info">{{ $portfolio->category }}</span></td>
                                        <td>{{ $portfolio->project_date->format('Y-m-d') }}</td>
                                        <td>{{ $portfolio->service }}</td>
                                        <td>
                                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" style="display:inline;">
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
