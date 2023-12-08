<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('pages.index')}}" target="_blank">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>На сайт ФИИТ</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Главная</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Меню
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
           aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Уч программа</span>
        </a>
        <div id="collapseBootstrap" class="collapse
            {{request()->route()->getName() === 'category.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'subcategory.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'teamDepartment.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'files.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'terms.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'disciplines.index' ? 'show' : ''}}
            " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Уч программа</h6>
                <a class="collapse-item {{request()->route()->getName() === 'category.index' ? 'active' : ''}}" href="{{route('category.index')}}">
                    Категории
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'subcategory.index' ? 'active' : ''}}" href="{{route('subcategory.index')}}">
                    Под Категории
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'teamDepartment.index' ? 'active' : ''}}" href="{{route('teamDepartment.index')}}">
                    Сотрудники
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'files.index' ? 'active' : ''}}" href="{{route('files.index')}}">
                    Файлы
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'terms.index' ? 'active' : ''}}" href="{{route('terms.index')}}">
                    Семестры
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'disciplines.index' ? 'active' : ''}}" href="{{route('disciplines.index')}}">
                    Дисциплины
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
           aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Фотогалерея</span>
        </a>
        <div id="collapseBootstrap" class="collapse
            {{request()->route()->getName() === 'photoCategory.index' ? 'show' : ''}}
            {{request()->route()->getName() === 'photoSubcategory.index' ? 'show' : ''}}
            " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Фотогалерея</h6>
                <a class="collapse-item {{request()->route()->getName() === 'photoCategory.index' ? 'active' : ''}}" href="{{route('photoCategory.index')}}">
                    Категории
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'photoSubcategory.index' ? 'active' : ''}}" href="{{route('photoSubcategory.index')}}">
                    Фотогалерея
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student"
           aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Студенческая жизнь</span>
        </a>
        <div id="student" class="collapse
            {{request()->route()->getName() === 'student.index' ? 'show' : ''}}
        {{request()->route()->getName() === 'studentContent.index' ? 'show' : ''}}
            " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Студенческая жизнь</h6>
                <a class="collapse-item {{request()->route()->getName() === 'student.index' ? 'active' : ''}}" href="{{route('student.index')}}">
                    Категории
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'studentContent.index' ? 'active' : ''}}" href="{{route('studentContent.index')}}">
                    Студенты
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#chart"
           aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Учебный процесс</span>
        </a>
        <div id="chart" class="collapse
            {{request()->route()->getName() === 'chart.index' ? 'show' : ''}}
        {{request()->route()->getName() === 'chartContent.index' ? 'show' : ''}}
        {{request()->route()->getName() === 'chartMaterial.index' ? 'show' : ''}}
            " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Учебный процесс</h6>
                <a class="collapse-item {{request()->route()->getName() === 'chart.index' ? 'active' : ''}}" href="{{route('chart.index')}}">
                    Категории
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'chartContent.index' ? 'active' : ''}}" href="{{route('chartContent.index')}}">
                    Курсы
                </a>
                <a class="collapse-item {{request()->route()->getName() === 'chartMaterial.index' ? 'active' : ''}}" href="{{route('chartMaterial.index')}}">
                    Расписание
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'instruction.index' ? 'active-bg' : ''}}" href="{{route('instruction.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Инструкция</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'subMenu.index' ? 'active-bg' : ''}}" href="{{route('subMenu.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Под меню (Факультет)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'block.index' ? 'active-bg' : ''}}" href="{{route('block.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>3 Блок кол-во кафедры</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'team.index' ? 'active-bg' : ''}}" href="{{route('team.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Руководство</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'slider.index' ? 'active-bg' : ''}}" href="{{route('slider.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Слайдер</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'blog.index' ? 'active-bg' : ''}}" href="{{route('blog.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Новости КНУ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'fiitBlog.index' ? 'active-bg' : ''}}" href="{{route('fiitBlog.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Новости ФИИТ</span>
        </a>
    </li>
    {{--
    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'department.index' ? 'active-bg' : ''}}" href="{{route('department.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Кафедры</span>
        </a>
    </li>
    --}}

    <li class="nav-item">
        <a class="nav-link {{request()->route()->getName() === 'programs.index' ? 'active-bg' : ''}}" href="{{route('programs.index')}}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Файлы Кафедры</span>
        </a>
    </li>
    @if(Auth::guard('admin')->user()->role == 0)
        <li class="nav-item">
            <a class="nav-link {{request()->route()->getName() === 'administrator.index' ? 'active-bg' : ''}}" href="{{route('administrator.index')}}">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Администраторы</span>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link">
                <i class="fab fa-fw fa-wpforms"></i>
                <span class="text-danger">Нет доступа!</span>
            </a>
        </li>
    @endif
    <hr class="sidebar-divider">
</ul>
