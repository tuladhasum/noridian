<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-briefcase nav-icon">

                    </i>
                    {{ trans('global.basicCRM.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.crm-statuses.index") }}" class="nav-link {{ request()->is('admin/crm-statuses') || request()->is('admin/crm-statuses/*') ? 'active' : '' }}">
                            <i class="fas fa-folder nav-icon">

                            </i>
                            {{ trans('global.crmStatus.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.crm-customers.index") }}" class="nav-link {{ request()->is('admin/crm-customers') || request()->is('admin/crm-customers/*') ? 'active' : '' }}">
                            <i class="fas fa-user-plus nav-icon">

                            </i>
                            {{ trans('global.crmCustomer.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.crm-notes.index") }}" class="nav-link {{ request()->is('admin/crm-notes') || request()->is('admin/crm-notes/*') ? 'active' : '' }}">
                            <i class="fas fa-sticky-note nav-icon">

                            </i>
                            {{ trans('global.crmNote.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.crm-documents.index") }}" class="nav-link {{ request()->is('admin/crm-documents') || request()->is('admin/crm-documents/*') ? 'active' : '' }}">
                            <i class="fas fa-folder nav-icon">

                            </i>
                            {{ trans('global.crmDocument.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-cog nav-icon">

                    </i>
                    {{ trans('global.clientManagementSetting.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.currencies.index") }}" class="nav-link {{ request()->is('admin/currencies') || request()->is('admin/currencies/*') ? 'active' : '' }}">
                            <i class="fas fa-money nav-icon">

                            </i>
                            {{ trans('global.currency.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.transaction-types.index") }}" class="nav-link {{ request()->is('admin/transaction-types') || request()->is('admin/transaction-types/*') ? 'active' : '' }}">
                            <i class="fas fa-money-check nav-icon">

                            </i>
                            {{ trans('global.transactionType.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.income-sources.index") }}" class="nav-link {{ request()->is('admin/income-sources') || request()->is('admin/income-sources/*') ? 'active' : '' }}">
                            <i class="fas fa-database nav-icon">

                            </i>
                            {{ trans('global.incomeSource.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.client-statuses.index") }}" class="nav-link {{ request()->is('admin/client-statuses') || request()->is('admin/client-statuses/*') ? 'active' : '' }}">
                            <i class="fas fa-server nav-icon">

                            </i>
                            {{ trans('global.clientStatus.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.project-statuses.index") }}" class="nav-link {{ request()->is('admin/project-statuses') || request()->is('admin/project-statuses/*') ? 'active' : '' }}">
                            <i class="fas fa-server nav-icon">

                            </i>
                            {{ trans('global.projectStatus.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-briefcase nav-icon">

                    </i>
                    {{ trans('global.clientManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                            <i class="fas fa-user-plus nav-icon">

                            </i>
                            {{ trans('global.client.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.project.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.notes.index") }}" class="nav-link {{ request()->is('admin/notes') || request()->is('admin/notes/*') ? 'active' : '' }}">
                            <i class="fas fa-sticky-note nav-icon">

                            </i>
                            {{ trans('global.note.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt nav-icon">

                            </i>
                            {{ trans('global.document.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                            <i class="fas fa-credit-card nav-icon">

                            </i>
                            {{ trans('global.transaction.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.client-reports.index") }}" class="nav-link {{ request()->is('admin/client-reports') || request()->is('admin/client-reports/*') ? 'active' : '' }}">
                            <i class="fas fa-bar-chart nav-icon">

                            </i>
                            {{ trans('global.clientReport.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>