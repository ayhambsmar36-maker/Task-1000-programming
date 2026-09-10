<x-dashboard.app>
    <x-filters-card :action="route('classrooms.index')" :reset-route="route('classrooms.index')">
        <div class="flex flex-row gap-1.5">
        <label for="name" class="text-md font-bold text-gray-600">اسم الصف</label>
        <input type="text" id="name" name="name" value="{{ request('name') }}" placeholder="ابحث..." class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
    </div>
       <div class="flex flex-row gap-1.5">
        <label for="capacity" class="text-md font-bold text-gray-600">السعة  </label>
        <input type="number" id="capacity" name="capacity" value="{{ request('capacity') }}" placeholder="ابحث..." class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    </x-filters-card>
    <x-card-table title="الصفوف" :columns="['الرقم', 'الاسم', 'الوصف ','السعة ','السعة الفعلية','تاريخ اخر تعديل','الاجراء']" :slot="$classrooms">
        @forelse($classrooms as $classroom)
            <tr>
                <td class="align-middle justify-center text-center">{{ $classroom->id }}</td>
                <td class="align-middle justify-center text-center">{{ $classroom->name }}</td>
                <td class="align-middle justify-center text-center">{{ $classroom->description }}</td>
                <td class="align-middle justify-center text-center">{{ $classroom->capacity }}</td>
                <td class="align-middle justify-center text-center">{{ $classroom->students_count }}</td>
                <td class="align-middle justify-center text-center">{{ $classroom->updated_at }}</td>
              
                <td>
                    <a href="{{ route('classrooms.edit', $classroom->id)}}" class="btn btn-primary">تعديل</a>
                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الصف؟')">حذف</button>
                    </form>
                    <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-info">عرض</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">لا يوجد صفوف مسجلة</td>
            </tr>
        @endforelse
    </x-card-table>
</x-dashboard.app>