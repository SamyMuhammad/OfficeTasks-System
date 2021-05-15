<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="nav-item start {{ setActiveClass('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">لوحة التحكم</span>
                    <span class="selected"></span>
                    {{-- <span class="arrow open"></span> --}}
                </a>
            </li>

            @can('view settings')
            <li class="nav-item {{ setActiveClass('admin.settings.*') }}">
                <a href="{{ route('admin.settings.index') }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الإعدادات</span>
                </a>
            </li>
            @endcan

            @can('view admins')
            <li class="nav-item {{ setActiveClass('admin.admins.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class=" icon-briefcase"></i>
                    <span class="title">المديرين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('admin.admins.index') }}">
                        <a href="{{ route('admin.admins.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create admins')
                    <li class="nav-item {{ setActiveClass('admin.admins.create') }}">
                        <a href="{{ route('admin.admins.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view users')
            <li class="nav-item {{ setActiveClass('admin.users.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">الموظفين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('admin.users.index') }}">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create users')
                    <li class="nav-item {{ setActiveClass('admin.users.create') }}">
                        <a href="{{ route('admin.users.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view clients')
            <li class="nav-item {{ setActiveClass('admin.clients.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">العملاء</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('admin.clients.index') }}">
                        <a href="{{ route('admin.clients.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create clients')
                    <li class="nav-item {{ setActiveClass('admin.clients.create') }}">
                        <a href="{{ route('admin.clients.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view receipts')
            <li class="nav-item {{ setActiveClass('admin.receipts.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-note"></i>
                    <span class="title">الفواتير</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('admin.receipts.index') }}">
                        <a href="{{ route('admin.receipts.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">كل الفواتير</span>
                        </a>
                    </li>
                    
                    <li class="nav-item {{ setActiveClass('admin.receipts.paid') }}">
                        <a href="{{ route('admin.receipts.paid') }}" class="nav-link">
                            <i class="fa fa-circle"></i>
                            <span class="title">الفواتير المدفوعة</span>
                        </a>
                    </li>

                    <li class="nav-item {{ setActiveClass('admin.receipts.unpaid') }}">
                        <a href="{{ route('admin.receipts.unpaid') }}" class="nav-link">
                            <i class="fa fa-circle-o"></i>
                            <span class="title">الفواتير الآجل</span>
                        </a>
                    </li>

                    @can('create receipts')
                    <li class="nav-item {{ setActiveClass('admin.receipts.create') }}">
                        <a href="{{ route('admin.receipts.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view tasks')
            <li class="nav-item {{ setActiveClass('admin.tasks.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-tasks"></i>
                    <span class="title">المهام</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('admin.tasks.index') }}">
                        <a href="{{ route('admin.tasks.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create tasks')
                    <li class="nav-item {{ setActiveClass('admin.tasks.create') }}">
                        <a href="{{ route('admin.tasks.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @canany(['view payment-methods', 'view expense-types'])
            <li class="nav-item {{ setActiveClass('admin.payment-methods.*') }} {{ setActiveClass('admin.expense-types.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">طرق الدفع وأنواع الصرف</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @can('view payment-methods')
                    <li class="nav-item {{ setActiveClass('admin.payment-methods.index') }}">
                        <a href="{{ route('admin.payment-methods.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span class="title">طرق الدفع</span>
                        </a>
                    </li>
                    @endcan

                    @can('view expense-types')
                    <li class="nav-item {{ setActiveClass('admin.expense-types.index') }}">
                        <a href="{{ route('admin.expense-types.index') }}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">أنواع الصرف</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @can('view categories')
            <li class="nav-item {{ setActiveClass('admin.categories.*') }}">
                <a href="{{ route('admin.categories.index') }}" class="nav-link nav-toggle">
                    <i class="icon-pie-chart"></i>
                    <span class="title">الأقسام</span>
                </a>
            </li>
            @endcan

            @can('view services')
            <li class="nav-item {{ setActiveClass('admin.services.*') }}">
                <a href="{{ route('admin.services.index') }}" class="nav-link nav-toggle">
                    <i class="icon-directions"></i>
                    <span class="title">الخدمات</span>
                </a>
            </li>
            @endcan

            @can('view task-statuses')
            <li class="nav-item {{ setActiveClass('admin.task-statuses.*') }}">
                <a href="{{ route('admin.task-statuses.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open-o"></i>
                    <span class="title">حالات المهام</span>
                </a>
            </li>
            @endcan
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->