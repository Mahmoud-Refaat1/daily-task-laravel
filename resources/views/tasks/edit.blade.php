@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex flex-column align-items-center">

    <h1 class="mb-4 fw-bold fs-3">✏️ تعديل المهمة</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="w-100" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label fw-bold fs-5">عنوان المهمة</label>
            <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold fs-5">وصف المهمة</label>
            <textarea name="description" id="description" rows="4" class="form-control rounded-4" required>{{ $task->description }}</textarea>
        </div>

        <div class="mb-4 form-check">
            <input class="form-check-input" type="checkbox" name="completed" id="completed" {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label fw-bold" for="completed">تم إنجاز المهمة</label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">💾 حفظ التعديلات</button>
    </form>

</div>
@endsection
