<div class="sidebar-menu">
    <div class="sidebarMenuScroll">
        <ul>
            <li class="active-page-link">
                <a href="index.html">
                    <i class="bi bi-house"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>



            @canany(['create-employee', 'edit-employee', 'delete-employee'])
            <li>
                <a href="{{ route('employees.index') }}">
                    <i class="bi bi-box"></i>
                    <span class="menu-text">Employees</span>
                </a>
            </li>
            @endcanany
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="bi bi-stickies"></i>
                    <span class="menu-text">Pages</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        @canany(['create-poste', 'edit-poste', 'delete-poste'])
                        <li>
                            <a href="{{ route('postes.index') }}">Postes</a>
                        </li>
                        @endcanany
                        @canany(['create-dept', 'edit-dept', 'delete-dept'])
                        <li>
                            <a href="{{ route('depts.index') }}">Teams</a>
                        </li>
                            @endcanany
                            @canany(['create-talent', 'edit-talent', 'delete-talent'])
                                <li>
                                    <a href="{{ route('talents.index') }}">Talents</a>
                                </li>
                            @endcanany

                        <li>
                            <a href="">Documents</a>
                        </li>
                        <li>
                            <a href="">Contrats</a>
                        </li>
                        <li>
                            <a href="">Abscences</a>
                        </li>
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
                        @canany('create-conges')
                            <li>
                                <a href="{{ route('conges.create') }}">
                                    Demander un Congé
                                </a>
                            </li>
                        @endcanany
                            @canany('view-conges')
                                <li>
                                    <a href="{{ route('conges.index') }}">
                                        Mes Demandes de Congés
                                    </a>
                                </li>
                            @endcanany
                            @canany('view-all-conges')
                                <li>
                                    <a href="{{ route('conges.index') }}">
                                        Toutes les Demandes de Congés
                                    </a>
                                </li>
                            @endcanany

                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Parametrages</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <li>
                                <a href="{{ route('roles.index') }}">Profiles</a>
                            </li>
                        @endcanany
                        @canany(['create-user', 'edit-user', 'delete-user'])
                            <li>
                                <a href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endcanany
                        <li>
                            <a href="">Alerts</a>
                        </li>

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
