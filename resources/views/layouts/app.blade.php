<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - لوحة التحكم</title>

    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #3498db;
            color: white;
        }
        .sidebar h5 {
            padding: 15px 20px;
            margin-top: 20px;
            color: #95a5a6;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .navbar-custom {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .main-content {
            padding: 30px;
        }
        .card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        table {
            background-color: white;
        }
        .form-control, .form-select {
            border-color: #ddd;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h4 class="px-3 mb-4">
                    <i class="fa fa-dashboard"></i> لوحة التحكم
                </h4>

                <a href="{{ route('admin.dashboard') }}" class="@if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                    <i class="fa fa-home"></i> الرئيسية
                </a>

                <a href="{{ route('admin.profile.edit') }}" class="@if(Route::currentRouteName() == 'admin.profile.edit') active @endif">
                    <i class="fa fa-user"></i> البيانات الشخصية
                </a>

                <h5 class="mt-4">الإدارة</h5>

                <a href="{{ route('admin.experience.index') }}" class="@if(Route::currentRouteName() == 'admin.experience.index' || Route::currentRouteName() == 'admin.experience.create' || Route::currentRouteName() == 'admin.experience.edit') active @endif">
                    <i class="fa fa-briefcase"></i> الخبرات
                </a>

                <a href="{{ route('admin.skill.index') }}" class="@if(Route::currentRouteName() == 'admin.skill.index' || Route::currentRouteName() == 'admin.skill.create' || Route::currentRouteName() == 'admin.skill.edit') active @endif">
                    <i class="fa fa-star"></i> المهارات
                </a>

                <a href="{{ route('admin.portfolio.index') }}" class="@if(Route::currentRouteName() == 'admin.portfolio.index' || Route::currentRouteName() == 'admin.portfolio.create' || Route::currentRouteName() == 'admin.portfolio.edit') active @endif">
                    <i class="fa fa-folder"></i> المشاريع
                </a>

                <a href="{{ route('admin.award.index') }}" class="@if(Route::currentRouteName() == 'admin.award.index' || Route::currentRouteName() == 'admin.award.create' || Route::currentRouteName() == 'admin.award.edit') active @endif">
                    <i class="fa fa-trophy"></i> الجوائز
                </a>

                <h5 class="mt-4">أخرى</h5>

                <a href="/">
                    <i class="fa fa-eye"></i> عرض الموقع
                </a>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <!-- Navbar -->
                <nav class="navbar navbar-custom">
                    <div class="container-fluid">
                        <span class="navbar-text text-dark">
                            <i class="fa fa-circle text-success"></i> آخر تحديث: الآن
                        </span>
                    </div>
                </nav>

                <!-- Content -->
                <div class="main-content">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>حدث خطأ!</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
