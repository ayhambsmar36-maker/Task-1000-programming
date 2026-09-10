<x-dashboard.app class="container">
    <div class="container-bg " style="display: flex ;justify-content:space-between ;wrap:wrap">
        <div class="container-sm text-center m-3 p-3  bg-slate-50 rounded-3 shadow-lg"
            style="width: 35% ; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;">
            <h2 class="text-secondary display-6">{{ $teacher->name }}</h2>
            <p class="text-secondary m-3 p-1">{{ $teacher->email }}</p>
            <p class="text-secondary">رقم الهاتف: {{ $teacher->phone_number }}</p>
            <p class="text-secondary">تاريخ الميلاد: {{ $teacher->birth_date }}</p>
            <p class="text-secondary">التخصص : {{ $teacher->specialization }}</p>

            <div class="d-flex justify-content-center">
                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary m-2">تعديل</a>
                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="m-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
        
    </div>
</x-dashboard.app>