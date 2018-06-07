<div class="breadcrumbs">
    <div class="row">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('page-title')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="{{ route('home')}}">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
    <div class="container row">
    @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
    {{$error}}
    </div>
    @endforeach
    @endif
    </div>
</div>