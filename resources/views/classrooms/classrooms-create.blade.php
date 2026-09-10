<x-dashboard.app class="container"  >
    <form action="{{ route('classrooms.store') }}" method="POST" style="width: 800px ; border:1px solid primary ;background:#f8f9fa; padding: 20px 30px; border-radius: 10px;" method="post"> 
        @csrf

        <div class="form-group">
            <x-input-label for="name" :value="__('الاسم')" />
            <x-text-area id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="description" :value="__('الوصف ')" />
            <x-text-area id="description" name="description" type="text" value="{{ old('description') }}" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="capacity" :value="__('السعة ')" />
            <x-text-area id="capacity" name="capacity" type="number" value="{{ old('capacity') }}" class="mt-1 block w-full" rows="1" required />
            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
        </div>
      
       

        <x-button type="submit" class="btn btn-primary" color="green" size="md">إضافة</x-button>
    </form>
</x-dashboard.app>