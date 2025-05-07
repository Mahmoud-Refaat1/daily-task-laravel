@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex flex-column align-items-center">

    <h2 class="mb-4 fw-bold">➕ إضافة مهمة جديدة</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="w-100" style="max-width: 600px;">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">عنوان المهمة</label>
            <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">وصف المهمة</label>
            <textarea name="description" id="description" rows="4" class="form-control rounded-4" required></textarea>
        </div>

        <div class="mb-4 form-check">
            <input class="form-check-input" type="checkbox" name="completed" id="completed">
            <label class="form-check-label fw-bold" for="completed">تم إنجاز المهمة</label>
        </div>

        <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill">✔️ حفظ المهمة</button>
    </form>

</div>
@endsection
