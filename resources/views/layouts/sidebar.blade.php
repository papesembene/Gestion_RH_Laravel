<div class="sidebar-menu">
    <div class="sidebarMenuScroll">
        <ul>
            <li class="active-page-link">
                <a href="">
                    <i class="bi bi-house"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="bi bi-stickies"></i>
                    <span class="menu-text">Pages</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        @canany(['my-planning'])
                            <li>
                                <a href="{{ route('my-planning') }}">
                                    <i class="bi bi-calendar"></i>
                                    <span class="menu-text">Mon Planning</span>
                                </a>
                            </li>
                        @endcanany

                            @canany(['team-planning'])
                                <li>
                                    <a href="{{ route('team-planning') }}">
                                        <i class="bi bi-people"></i>
                                        <span class="menu-text">Team Planning</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-employee', 'edit-employee', 'delete-employee'])
                                <li>
                                    <a href="{{ route('employees.index') }}">
                                        <i class="bi bi-person-plus"></i>
                                        <span class="menu-text">Employees</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-poste', 'edit-poste', 'delete-poste'])
                                <li>
                                    <a href="{{ route('postes.index') }}">
                                        <i class="bi bi-plus-circle"></i>
                                        <span class="menu-text">Postes</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-planning', 'edit-planning', 'delete-planning'])
                                <li>
                                    <a href="{{ route('plannings.index') }}">
                                        <i class="bi bi-calendar-plus"></i>
                                        <span class="menu-text">Plannings</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-dept', 'edit-dept', 'delete-dept'])
                                <li>
                                    <a href="{{ route('depts.index') }}">
                                        <i class="bi bi-people"></i>
                                        <span class="menu-text">Teams</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-talent', 'edit-talent', 'delete-talent'])
                                <li>
                                    <a href="{{ route('talents.index') }}">
                                        <i class="bi bi-star"></i>
                                        <span class="menu-text">Talents</span>
                                    </a>
                                </li>
                            @endcanany


                            @canany(['create-document', 'edit-document', 'delete-document'])
                                <li>
                                    <a href="{{ route('documents.index') }}">
                                        <i class="bi bi-file-text"></i>
                                        <span class="menu-text">Documents</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-contrat', 'edit-contrat', 'delete-contrat'])
                                <li>
                                    <a href="{{ route('contrats.index') }}">
                                        <i class="bi bi-pencil"></i>
                                        <span class="menu-text">Contrats</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-abscence', 'edit-abscence', 'delete-abscence'])
                                <li>
                                    <a href="{{ route('abscences.index') }}">
                                        <i class="bi bi-calendar"></i>
                                        <span class="menu-text">Abscences</span>
                                    </a>
                                </li>
                            @endcanany

                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Conges</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        @can('create-conges')
                            <li>
                                <a href="{{ route('conges.index') }}">
                                    <i class="bi bi-beach"></i>
                                    <span class="menu-text">Mes Demandes de Congés</span>
                                </a>
                            </li>
                        @endcan

                    @canany('view-conges')
                                <li>
                                    <a href="{{ route('conges.index') }}">
                                        Mes Demandes de Congés
                                    </a>
                                </li>
                            @endcanany
                            @can('view-all-conges')
                                <li>
                                    <a href="{{ route('conges.index') }}">
                                        <i class="bi bi-list"></i>
                                        <span class="menu-text">Toutes les Demandes de Congés</span>
                                    </a>
                                </li>
                            @endcan


                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="bi bi-gear"></i>
                    <span class="menu-text">Paramétrages</span>
                </a>

                <div class="sidebar-submenu">
                    <ul>
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <li>
                                <a href="{{ route('roles.index') }}">
                                    <i class="bi bi-badge"></i>
                                    <span class="menu-text">Profiles</span>
                                </a>
                            </li>
                        @endcanany

                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li>
                                    <a href="{{ route('users.index') }}">
                                        <i class="bi bi-person"></i>
                                        <span class="menu-text">Users</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['create-alert', 'edit-alert', 'delete-alert'])
                                <li>
                                    <a href="{{ route('alerts.index') }}">
                                        <i class="bi bi-bell"></i>
                                        <span class="menu-text">Alerts</span>
                                    </a>
                                </li>
                            @endcanany


                    </ul>
                </div>
            </li>
            <li>
                <a href="forgot-password.html">
                    <i class="bi bi-emoji-expressionless"></i>
                    <span class="menu-text">Forgot Password</span>
                </a>
            </li>


        </ul>
    </div>
</div>
