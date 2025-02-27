<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Administration CJ AONG</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    
    <!-- Additional CSS -->
    @yield('styles')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        
        <div class="main-content">
            <!-- Header -->
            @include('admin.layouts.header')
            
            <!-- Content -->
            <div class="content-wrapper">
                <div class="container-fluid">
                    @include('admin.layouts.alerts')
                    @yield('content')
                </div>
            </div>
            
            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    
    <!-- Additional JS -->
    @yield('scripts')
</body>
</html> 