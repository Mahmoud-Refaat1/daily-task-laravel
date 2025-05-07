@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex flex-column align-items-center">

    <!-- زر إضافة مهمة -->
    <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg mb-4 px-5 rounded-pill">
        ➕ إضافة مهمة جديدة
    </a>

    <!-- إشعار نجاح -->
    @if(session('success'))
        <div id="flash-message" class="alert alert-success text-center fw-bold" role="alert">
             ✅ {{ session('success') }}
         </div>
    @endif

    @if(session('deleted'))
         <div id="flash-message" class="alert alert-danger text-center fw-bold" role="alert">
             🗑️ {{ session('deleted') }}
        </div>
    @endif

    @if(session('updated'))
        <div id="flash-message" class="alert alert-info text-center fw-bold" role="alert">
            ✏️ {{ session('updated') }}
        </div>
    @endif

    <!-- قائمة المهام -->
    @if($tasks->count())
        <div class="d-flex flex-wrap justify-content-center gap-4 w-100">
            @foreach($tasks as $task)
    <div class="card shadow-sm rounded-4 border-0 p-4 " style="width: 100%; max-width: 500px;">
        <h3 class="fw-bold mb-2 text-center fs-3">{{ $task->title }}</h3>
        <p class="text-muted mb-2 text-center fs-5">{{ $task->description }}</p>
        <small class="text-muted d-block text-end">📅 {{ $task->created_at->format('Y-m-d H:i') }}</small>

        <div class="mb-3">
            @if($task->completed)
                <span class="badge bg-success px-3 py-2 fs-6">✅ منجزة</span>
            @else
                <span class="badge bg-secondary px-3 py-2 fs-6">⏳ غير منجزة</span>
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-lg rounded-pill w-45">
                ✏️ تعديل
            </a>

            <!-- زر فتح المودال -->
            <button type="button" class="btn btn-danger btn-lg rounded-pill w-45"
                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}">
                🗑️ حذف
            </button>
        </div>
    </div>

    <!-- مودال الحذف (خارج الكارد لكن داخل اللوب) -->
    <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"
         aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header bg-danger text-white rounded-top-4">
                    <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">تأكيد الحذف</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="fs-5">هل أنت متأكد أنك تريد حذف المهمة:</p>
                    <p class="fw-bold text-danger">"{{ $task->title }}"؟</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4 rounded-pill">نعم، احذفها</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

                {{-- <!-- مودال تأكيد الحذف -->
        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"       aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0">
                    <div class="modal-header bg-danger text-white rounded-top-4">
                      <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">تأكيد الحذف</h5>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                <div class="modal-body text-center">
                    <p class="fs-5">هل أنت متأكد أنك تريد حذف المهمة:</p>
                    <p class="fw-bold text-danger">"{{ $task->title }}"؟</p>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">إلغاء</button>
  
              <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger px-4 rounded-pill">نعم، احذفها</button>
             </form>
        </div> --}}
      </div>
    </div>
  </div>
  
        </div>
    @else
        <div class="text-center text-muted fs-5 mt-4">
            🚫 لا توجد مهام بعد. ابدأ بإضافة أول مهمة الآن!
        </div>
    @endif

</div>
@endsection
