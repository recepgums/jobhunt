<div class="sidebar -dashboard">

    <div class="sidebar__item @if(request()->is('admin')) -is-active -dark-bg-dark-2 @endif">
        <a href="{{route('admin.index')}}" class="d-flex items-center text-17 lh-1 fw-500 @if(request()->is('admin')) -dark-text-white" @endif>
            <i class="text-20 icon-discovery mr-15"></i>
            Dashboard
        </a>
    </div>
    <div class="sidebar__item @if(request()->is('admin/faq')) -is-active -dark-bg-dark-2 @endif">
        <a href="{{route('admin.faq.index')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
            <i class="text-20 icon-play-button mr-15"></i>
            FAQ
        </a>
    </div>
    <div class="sidebar__item @if(request()->is('admin/reviews')) -is-active -dark-bg-dark-2 @endif">
        <a href="{{route('admin.reviews')}}" class="d-flex items-center text-17 lh-1 fw-500 @if(request()->is('admin')) -dark-text-white" @endif">
            <i class="text-20 icon-play-button mr-15"></i>
            Reviews
        </a>
    </div>
</div>
