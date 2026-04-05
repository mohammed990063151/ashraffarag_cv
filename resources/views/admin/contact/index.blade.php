@extends('layouts.app')

@section('title', 'رسائل التواصل')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="mb-0"><i class="fa fa-envelope"></i> رسائل التواصل</h5>
                <span class="badge bg-light text-primary">{{ $messages->total() }} رسالة</span>
            </div>
            <div class="card-body p-0">
                @if($messages->isEmpty())
                    <div class="p-4 text-center text-muted">
                        <i class="fa fa-inbox fa-3x mb-3 d-block opacity-50"></i>
                        لا توجد رسائل بعد. عند إرسال الزوار لنموذج التواصل في الموقع ستظهر هنا.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">البريد</th>
                                    <th scope="col">الموضوع</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col" class="text-end">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $msg)
                                    <tr>
                                        <td>{{ $messages->firstItem() + $loop->index }}</td>
                                        <td><strong>{{ $msg->name }}</strong></td>
                                        <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 220px;" title="{{ $msg->subject }}">
                                                {{ $msg->subject ?: '—' }}
                                            </span>
                                        </td>
                                        <td><small class="text-muted">{{ $msg->created_at->format('Y-m-d H:i') }}</small></td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#msgModal{{ $msg->id }}">
                                                <i class="fa fa-eye"></i> عرض
                                            </button>
                                            <form action="{{ route('admin.contact.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف هذه الرسالة؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 border-top">
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@foreach($messages ?? [] as $msg)
    <div class="modal fade" id="msgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">رسالة من {{ $msg->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">البريد</dt>
                        <dd class="col-sm-9"><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></dd>
                        <dt class="col-sm-3">الموضوع</dt>
                        <dd class="col-sm-9">{{ $msg->subject ?: '—' }}</dd>
                        <dt class="col-sm-3">التاريخ</dt>
                        <dd class="col-sm-9">{{ $msg->created_at->format('Y-m-d H:i') }}</dd>
                        <dt class="col-sm-12 mt-2">النص</dt>
                        <dd class="col-sm-12"><pre class="bg-light p-3 rounded border mb-0 text-wrap" style="white-space: pre-wrap;">{{ $msg->message }}</pre></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
