@extends('layouts.app')

@section('title', 'إدارة الجوائز')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-trophy"></i> الجوائز</h5>
                <a href="{{ route('admin.award.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> إضافة جائزة جديدة
                </a>
            </div>
            <div class="card-body">
                @if($awards->isEmpty())
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> لا توجد جوائز مسجلة حالياً
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>الجائزة/الشهادة</th>
                                    <th>تاريخ البداية</th>
                                    <th>تاريخ النهاية</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($awards as $key => $award)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $award->title }}</strong></td>
                                        <td>{{ $award->start_date->format('Y-m-d') }}</td>
                                        <td>{{ $award->end_date ? $award->end_date->format('Y-m-d') : 'مستمرة' }}</td>
                                        <td>
                                            <a href="{{ route('admin.award.edit', $award) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.award.destroy', $award) }}" method="POST" style="display:inline;">
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
