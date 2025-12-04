@extends('layouts.app')

@section('title', 'إدارة المهارات')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-star"></i> المهارات</h5>
                <a href="{{ route('admin.skill.create') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-plus"></i> إضافة مهارة جديدة
                </a>
            </div>
            <div class="card-body">
                @if($skills->isEmpty())
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> لا توجد مهارات مسجلة حالياً
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>المهارة</th>
                                    <th>مستوى الإتقان</th>
                                    <th>الرمز</th>
                                    <th>الترتيب</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skills as $key => $skill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong>{{ $skill->name }}</strong></td>
                                        <td>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $skill->percentage }}%">
                                                    {{ $skill->percentage }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($skill->icon)
                                                <i class="fa {{ $skill->icon }}"></i> {{ $skill->icon }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $skill->order }}</td>
                                        <td>
                                            <a href="{{ route('admin.skill.edit', $skill) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.skill.destroy', $skill) }}" method="POST" style="display:inline;">
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
