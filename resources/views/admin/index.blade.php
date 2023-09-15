<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Dashboard')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script src="{{ asset('js/jquery-3.6.4.js') }}"></script>
</head>

<body>
    @php
        $admin = \Auth::guard('admin')->user();
        $name = $admin->name;
    @endphp
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>N-Vite</div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ route('admin.index') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('admin.order') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Orders</a>
                <a href="{{ route('admin.category') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Category</a>
                <a href="{{ route('admin.subcategory') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Sub-Category</a>
                <a href="{{ route('admin.item') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Items</a>
                <a href="{{ route('admin.query') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Query</a>
                <a href="{{ route('admin.user') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class=""></i>Admins</a>
                <form action="{{ route('logoutadmin') }}" method="POST">
                    @csrf
                    <button
                        class="fas fa-power-off me-2 list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                        type="submit">Logout</button>
                </form>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <!-- <h2 class="fs-2 m-0">Dashboard</h2> -->
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <p class="navbar-nav ms-auto mb-2 mb-lg-0 fas fa-user me-2">{{ $name }}</p>
            </nav>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>


    <script>
        $("#menu-toggle").click(function () {
            $("#sidebar-wrapper").toggle();
        });

    </script>
</body>

</html>
