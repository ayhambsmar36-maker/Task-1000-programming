<x-dashboard.app>
<x-filters-card :action="route('teachers.index')" :reset-route="route('teachers.index')"  >
    <!-- حقل 1 -->
    <div class="flex flex-row gap-1.5">
        <label for="name" class="text-xs font-bold text-gray-600">اسم المعلم</label>
        <input type="text" id="name" name="name" value="{{ request('name') }}" placeholder="ابحث..." class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <!-- حقل 2 -->
    <div class="flex flex-row gap-1.5">
        <label for="classroom_id" class="text-xs font-bold text-gray-600">الصف الدراسي</label>
        <select id="classroom_id" name="classroom_id" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
            <option value="">الكل</option>
          @foreach($teachers->unique('classroom_id') as $teacher)
            <option value="{{ $teacher->classroom_id }}" {{ request('classroom_id') == $teacher->classroom_id ? 'selected' : '' }}>{{ $teacher->classroom->name }}</option> 
            @endforeach
        </select>
    </div>
</x-filters-card>
    <x-card-table title="المدرسين" :columns="['الرقم', 'الاسم', 'البريد الإلكتروني','التخصص','رقم الهاتف','رقم معرف الصف','اسم الصف','الاجراء']" :slot="$teachers">
        @forelse($teachers as $teacher)
            <tr>
                <td class="align-middle justify-center text-center">{{ $teacher->id }}</td>
                <td class="align-middle justify-center text-center">{{ $teacher->name }}</td>
                <td class="align-middle justify-center text-center">{{ $teacher->email }}</td>
                <td class="align-middle justify-center text-center">{{ $teacher->specialization }}</td>
                <td class="align-middle justify-center text-center">{{ $teacher->phone_number }}</td>
                <td class="align-middle justify-center text-center">{{ $teacher->classroom_id }}</td>
                <td class="align-middle justify-center text-center"><a href="{{ route('classrooms.show',$teacher->classroom_id) }}" class="btn btn-info btn-sm align-middle">{{ $teacher->classroom->name }}</a></td>
                <td>
                    ,
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">تعديل</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المدرس؟')">حذف</button>
                    </form> 
                   <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info">عرض</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">لا يوجد مدرسين</td>
            </tr>
        @endforelse
    </x-card-table>
</x-dashboard.app>