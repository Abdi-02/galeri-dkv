<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin - DKV SMKN 1 Nabire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-card { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn-oranye { background-color: #fd7e14; color: white; font-weight: bold; }
        .btn-oranye:hover { background-color: #e36a00; color: white; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card p-4">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4 class="fw-bold text-primary">Portal Admin DKV</h4>
                            <p class="text-muted">Silakan masuk untuk mengelola galeri</p>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/portal-rahasia" method="POST">
                            @csrf <div class="mb-3">
                                <label class="form-label fw-medium">Alamat Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" required placeholder="Masukkan email admin">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-medium">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" required placeholder="Masukkan password">
                            </div>
                            
                            <button type="submit" class="btn btn-oranye w-100 btn-lg rounded-pill">Masuk Sistem</button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <a href="/" class="text-decoration-none text-secondary text-sm">&larr; Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>