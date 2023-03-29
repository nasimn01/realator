<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-files"></i>
            <span>{{__('Manage Website')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Setting')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.country.index')}}">{{__('Country')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.division.index')}}">{{__('Division')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('District')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.thana.index')}}">{{__('Thana')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('Users')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.home.index')}}">{{__('Home Page')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.slider.index')}}">{{__('Slider')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.founder.index')}}">{{__('Founder Message')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.location.index')}}">{{__('Location')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.category.index')}}">{{__('Property Category')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.advance.index')}}">{{__('Advance Feature')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.ameneties.index')}}">{{__('Ameneties')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.property.index')}}">{{__('Property')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.proPhoto.index')}}">{{__('Property Photo')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.review.index')}}">{{__('Customer Review')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.blog.index')}}">{{__('Blog')}}</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-files"></i>
            <span>{{__('Property')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.category.index')}}">{{__('Property Category')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.advance.index')}}">{{__('Advance Feature')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.ameneties.index')}}">{{__('Ameneties')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.property.index')}}">{{__('Property')}}</a>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="{{route(currentUser().'.proPhoto.index')}}">{{__('Property Photo')}}</a>
            </li>
        </ul>
    </li>
    
</ul>
