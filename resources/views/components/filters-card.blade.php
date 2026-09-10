@props([
    'action',
    'method' => 'GET',
    'resetRoute' => null,
    'hasFilters' => false
])

<form action="{{ $action }}" method="{{ $method }}" style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e5e7eb; max-width: 900px; margin: 20px auto; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
    <div style="display: flex; align-items: center ;justify-content: space-between; gap: 16px;">
        
        <!-- الحقول الديناميكية -->
        {{ $slot }}

        <!-- قسم الأزرار -->
        <div style="display: flex; gap: 8px;">
            <button type="submit" style="background-color: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: 0.2s;">
                بحث
            </button>

            @if($resetRoute && ($hasFilters || request()->query()))
                <a href="{{ $resetRoute }}" style="background-color: #f3f4f6; color: #4b5563; text-decoration: none; padding: 10px 14px; border-radius: 10px; font-size: 14px; display: flex; align-items: center; justify-content: center;">
                    اعادة ضبط
                </a>
            @endif
        </div>

    </div>
</form>