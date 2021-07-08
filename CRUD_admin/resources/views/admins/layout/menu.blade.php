<nav class="main-menu">
    <ul>
        <li>
            <a href="{{route('dashboard')}}">
                <i class="fa fa-home nav_icon"></i>
                <span class="nav-text">
                    Dashboard
                </span>
            </a>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-user nav_icon" aria-hidden="true"></i>
                <span class="nav-text">Users</span>

            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="{{route('listUser')}}">
                        List User
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{route('addUser')}}">
                        Add New User
                    </a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-check-square nav_icon"></i>
                <span class="nav-text">
                    Forms
                </span>

            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="inputs.html">Inputs</a>
                </li>
                <li>
                    <a class="subnav-text" href="validation.html">Form Validation</a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-file nav_icon"></i>
                <span class="nav-text">Pages</span>

            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="gallery.html">
                        Image Gallery
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="calendar.html">
                        Calendar
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="signup.html">
                        Sign Up Page
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="login.html">
                        Login Page
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="charts.html">
                <i class="fa fa-chart-bar nav_icon"></i>
                <span class="nav-text">
                    Charts
                </span>
            </a>
        </li>
        <li>
            <a href="typography.html">
                <i class="fa fa-font nav_icon"></i>
                <span class="nav-text">
                    Typography
                </span>
            </a>
        </li>
        <li>
            <a href="tables.html">
                <i class="fa fa-table nav_icon"></i>
                <span class="nav-text">
                    Tables
                </span>
            </a>
        </li>
        <li>
            <a href="maps.html">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span class="nav-text">
                    Maps
                </span>
            </a>
        </li>
        <li>
            <a href="error.html">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                <span class="nav-text">
                    Error Page
                </span>
            </a>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                <span class="nav-text">Extras</span>

            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="faq.html">FAQ</a>
                </li>
                <li>
                    <a class="subnav-text" href="blank.html">Blank Page</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="logout">
        <li>
            <a href="login.html">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">
                    Logout
                </span>
            </a>
        </li>
    </ul>
</nav>