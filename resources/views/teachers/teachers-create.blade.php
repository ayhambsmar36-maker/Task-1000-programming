<x-dashboard.app class="container">  
    <form action="{{ route('teachers.store') }}" method="POST" style="width: 800px ; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;">
        @csrf

         <div class="form-group">
            <x-input-label for="name" :value="__('الاسم')" />
            <x-text-area id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-area id="email" name="email" type="email" value="{{ old('email') }}" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="phone_number" :value="__('رقم الهاتف')" />
            <x-text-area id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="mt-1 block w-full" rows="1" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="specilization" :value="__('التخصص')" />
            <x-text-area id="specilization" name="specialization" type="text" value="{{ old('specilization') }}" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('specilization')" class="mt-2" />
        </div>
       <div class="form-group">
            <x-input-label for="classroom_id" :value="__('اسم الصف')" />
             <select id="classroom_id" name="classroom_id" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none scroll-m-0">
            <option value="">الكل</option>
          @foreach($classrooms as $classroom)
            <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option> 
            @endforeach
        </select>
            <x-input-error :messages="$errors->get('classroom_id')" class="mt-2 " style="red" />
        </div>
         <x-button type="submit" class="btn btn-primary" color="green" size="md">إضافة</x-button>
    </form>

</x-dashboard.app>
