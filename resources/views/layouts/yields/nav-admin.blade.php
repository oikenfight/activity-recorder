@section('nav-admin')
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

        <div class="navbar-header">
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            <a class="navbar-brand" href="">Top</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.video.index') }}">ビデオ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.action.index') }}">アクション</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.collaborator.index') }}">協力者</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="dropdown-item"><a class="text-secondary" href="/">一般画面へ</a></li>
            </ul>
        </div>
    </nav>
@endsection
