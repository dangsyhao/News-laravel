<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Notification" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Notification</span>
                </a>
                <ul class="sidenav-second-level collapse" id="Notification">
                    <li>
                        <a href="{{route('admin.notifi-getNotifi')}}">Notifi List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Author" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse" id="Author">
                    <li>
                        <a href="{{route('admin.user.role.getList')}}">User Category</a>
                    </li>
                    <li>
                        <a href="{{route('admin.user.getList')}}">User List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Post" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Posts</span>
                </a>
                <ul class="sidenav-second-level collapse" id="Post">
                    <li>
                        <a href="{{route('admin.getPostCategoryTable-post')}}">Post Category</a>
                    </li>
                    <li>
                        <a href="{{route('admin.post.getPost')}}">Post List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Advertise" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Advertise</span>
                </a>
                <ul class="sidenav-second-level collapse" id="Advertise">
                    <li>
                        <a href="{{route('admin.advertise-getAdvertise')}}">Advertise List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Menus</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="{{route('admin.menu.category.index')}}">Menu Category</a>
                    </li>
                    <li>
                        <a href="{{route('admin.navBar-getNavBar')}}">List Menus</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{route('admin.photos-getList')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Files Manager</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a  type='button 'class="btn btn-danger " href="{{route('site.logout')}}">
                    <i class="fa fa-fw fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>