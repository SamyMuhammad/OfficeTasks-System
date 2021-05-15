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
            <li class="nav-item start {{ setActiveClass('home') }}">
                <a href="{{ route('home') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الصفحة الرئيسية</span>
                    {{-- <span class="selected"></span> --}}
                    {{-- <span class="arrow open"></span> --}}
                </a>
            </li>

            @can('view receipts')
            <li class="nav-item {{ setActiveClass('receipts.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-note"></i>
                    <span class="title">الفواتير</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('receipts.index') }}">
                        <a href="{{ route('receipts.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">كل الفواتير</span>
                        </a>
                    </li>
                    
                    <li class="nav-item {{ setActiveClass('receipts.paid') }}">
                        <a href="{{ route('receipts.paid') }}" class="nav-link">
                            <i class="fa fa-circle"></i>
                            <span class="title">الفواتير المدفوعة</span>
                        </a>
                    </li>

                    <li class="nav-item {{ setActiveClass('receipts.unpaid') }}">
                        <a href="{{ route('receipts.unpaid') }}" class="nav-link">
                            <i class="fa fa-circle-o"></i>
                            <span class="title">الفواتير الآجل</span>
                        </a>
                    </li>

                    @can('create receipts')
                    <li class="nav-item {{ setActiveClass('receipts.create') }}">
                        <a href="{{ route('receipts.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view imports')
            <li class="nav-item {{ setActiveClass('imports.*') }}">
                <a href="{{ route('imports.index') }}" class="nav-link nav-toggle">
                    <i class=" icon-arrow-right"></i>
                    <span class="title">الواردات</span>
                    {{-- <span class="arrow"></span> --}}
                </a>
            </li>
            @endcan

            <li class="heading">
                <h3 class="uppercase font-size-17">
                    <i class="icon-arrow-left"></i>
                    الصادرات
                </h3>
            </li>
            @can('view paid-salaries')
            <li class="nav-item {{ setActiveClass('paid-salaries.*') }}">
                <a href="{{ route('paid-salaries.index') }}" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">الرواتب</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('paid-salaries.index') }}">
                        <a href="{{ route('paid-salaries.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create paid-salaries')
                    <li class="nav-item {{ setActiveClass('paid-salaries.create') }}">
                        <a href="{{ route('paid-salaries.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view bonuses')
            <li class="nav-item {{ setActiveClass('bonuses.*') }}">
                <a href="{{ route('bonuses.index') }}" class="nav-link nav-toggle">
                    <i class="icon-credit-card"></i>
                    <span class="title">المكافآت</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('bonuses.index') }}">
                        <a href="{{ route('bonuses.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create bonuses')
                    <li class="nav-item {{ setActiveClass('bonuses.create') }}">
                        <a href="{{ route('bonuses.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view expenses')
            <li class="nav-item {{ setActiveClass('expenses.*') }}">
                <a href="{{ route('expenses.index') }}" class="nav-link nav-toggle">
                    <i class="icon-basket-loaded"></i>
                    <span class="title">المصروفات العامة</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('expenses.index') }}">
                        <a href="{{ route('expenses.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>

                    @can('create expenses')
                    <li class="nav-item {{ setActiveClass('expenses.create') }}">
                        <a href="{{ route('expenses.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            <li class="heading">
                <h3 class="uppercase font-size-17">
                    <i class="fa fa-tasks"></i>
                    المهام
                </h3>
            </li>
            <li class="nav-item {{ setActiveClass('tasks.categoryTasks') }}">
                <a href="{{ route('tasks.categoryTasks') }}" class="nav-link nav-toggle">
                    <i class="fa fa-pie-chart"></i>
                    <span class="title">مهام القسم</span>
                </a>
            </li>
            <li class="nav-item {{ setActiveClass('tasks.myTasks') }}">
                <a href="{{ route('tasks.myTasks') }}" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <span class="title">مهامي</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->