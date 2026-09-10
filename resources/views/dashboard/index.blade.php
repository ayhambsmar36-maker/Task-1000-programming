<x-dashboard.app class="container" >
<div class="row">
        <x-card title="إجمالي الطلاب" count="{{ $dashboardData['studentsCount'] }}" icon="fas fa-user-graduate" class="bg-info" link="#" />
        <x-card title="الكادر التدريسي" count="{{ $dashboardData['teachersCount'] }}" icon="fas fa-chalkboard-teacher" class="bg-warning" link="#" />
        <x-card title="الصفوف الدراسية" count="{{ $dashboardData['classCount'] }}" icon="fas fa-chalkboard" class="bg-success" link="#" />
     
</div>
<div class="table">
    <x-card-table title="الطلاب المسجلين مؤخرا" :columns="['الرقم', 'الاسم', 'البريد الإلكتروني','الاجراء']" :slot="$dashboardData['students']">
        @forelse($dashboardData['students'] as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">تعديل</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">لا يوجد طلاب مسجلين مؤخرا</td>
            </tr>
        @endforelse
    </x-card-table>

</div>

</x-dashboard.app>
