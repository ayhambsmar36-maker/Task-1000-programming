<x-dashboard.app class="container">
    <div class="container-bg " style="display: flex ;justify-content:space-between ;wrap:wrap">
        <div class="container-sm text-center m-3 p-3  bg-slate-50 rounded-3 shadow-lg"
            style="width: 35% ; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;">
            <h2 class="text-secondary display-6">{{ $classroom->name }}</h2>
            <p class="text-secondary m-3 p-1">{{ $classroom->description }}</p>
            <p class="text-secondary">السعة: {{ $classroom->capacity }} طالب </p>
            <p class="text-secondary">السعة الفعلية : {{ $classroom->students_count }}</p>
            <p class="text-secondary">اخر تعديل : {{ $classroom->updated_at }}</p>

            <div class="d-flex justify-content-center">
                <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-primary m-2">تعديل</a>
                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" class="m-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
        <div class="info-class" style="width: 65%;margin: 0 auto; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;">
            <x-card-table title="الطلاب في الصف " :columns="['الرقم', 'الاسم', 'البريد الإلكتروني', 'الاجراء']">
                @forelse($classroom->students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">تعديل</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">حذف</button>
                            </form>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">عرض</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">لا يوجد طلاب مسجلين في هذا الصف</td>
                    </tr>
                @endforelse
            </x-card-table>
            <x-card-table title="الكادر التدريسي في الصف " :columns="['الرقم', 'الاسم', 'التخصص', 'الاجراء']">
                @forelse($classroom->teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">تعديل</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المعلم؟')">حذف</button>
                            </form>
                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info">عرض</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">لا يوجد كادر تدريسي مسجل في هذا الصف</td>
                    </tr>
                @endforelse
            </x-card-table>
        </div>
    </div>
</x-dashboard.app>
