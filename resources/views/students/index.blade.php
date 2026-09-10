<x-dashboard.app>
    <x-filters-card :action="route('students.index')" :reset-route="route('students.index')" >
          <!-- حقل 1 -->
    <div class="flex flex-row gap-1.5">
        <label for="name" class="text-xs font-bold text-gray-600">اسم الطالب</label>
        <input type="text" id="name" name="name" value="{{ request('name') }}" placeholder="ابحث..." class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <!-- حقل 2 -->
    <div class="flex flex-row gap-1.5">
        <label for="classroom_id" class="text-xs font-bold text-gray-600">الصف الدراسي</label>
        <select id="classroom_id" name="classroom_id" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
            <option value="">الكل</option>
          @foreach($students->unique('classroom_id') as $student)
            <option value="{{ $student->classroom_id }}" {{ request('classroom_id') == $student->classroom_id ? 'selected' : '' }}>{{ $student->classroom->name }}</option> 
            @endforeach
        </select>
    </div>

    </x-filters-card>
    <x-card-table title="الطلاب" :columns="['الرقم', 'الاسم', 'البريد الإلكتروني','رقم الهاتف','رقم معرف الصف','اسم الصف','تاريخ الميلاد','الاجراء']" :slot="$students">
        @forelse($students as $student)
            <tr>
                <td class="align-middle justify-center text-center">{{ $student->id }}</td>
                <td class="align-middle justify-center text-center">{{ $student->name }}</td>
                <td class="align-middle justify-center text-center">{{ $student->email }}</td>
                <td class="align-middle justify-center text-center">{{ $student->phone_number }}</td>
                <td class="align-middle justify-center text-center">{{ $student->classroom_id }}</td>
                <td class="align-middle justify-center text-center"><a href="{{ route('classrooms.show',$student->classroom_id) }}" class="btn btn-info btn-sm align-middle">{{ $student->classroom->name }}</a></td>
                <td class="align-middle justify-center text-center">{{ $student->birth_date }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary">تعديل</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">حذف</button>
                    </form>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">عرض</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">لا يوجد طلاب</td>
            </tr>
        @endforelse
    </x-card-table>
</x-dashboard.app>