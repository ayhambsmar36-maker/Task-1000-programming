@props([
    'title' => '',
    'link' => '#',
    'count' => 0,
    'icon' => 'fas fa-user-graduate',
    'class' => 'bg-info',
    ])

     <div class="col-lg-3 col-6">
            <div class="small-box {{ $class }}">
                <div class="inner">
                    <h3> {{ $count }} </h3>
                    <p> {{ $title }} </p>
                </div>
                <div class="icon">
                    <i class="{{ $icon }}"></i>
                </div>
                <a href="{{ $link }}" class="small-box-footer">التفاصيل <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>