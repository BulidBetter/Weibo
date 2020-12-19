<div class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pages.index') }}" title="">Weibo App</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link" href="#" title="">用户列表</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" title="">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}" title=""><i class="fa fa-user-alt"></i>&nbsp;&nbsp;个人中心</a>
                            <a class="dropdown-item" href="#" title=""><i class="fa fa-user-edit"></i>&nbsp;编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <form class="dropdown-item" action="{{ route('sessions.destory') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-block" type="submit"><i class="fa fa-power-off"></i>&nbsp;安全退出</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('pages.help') }}" title="">帮助</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sessions.create') }}" title="">登录</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
