<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('dashboard.index')}}">Author Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{route('author.post-getAdd')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Create New Post</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{route('author.post-getList')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Posts</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{{route('files.index')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Files Manager</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form id="logout-form" action="{{ route('site.logout') }}" method="GET" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a  type='button 'class="btn btn-danger " href="{{ route('site.logout') }}">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
