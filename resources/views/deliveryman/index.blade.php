<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Sopir</title>
  <link rel="icon" href="/images/wings-logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom, #4B90E2, #66C4EC);
      color: white;
      height: 100vh;
    }
    .card-custom {
      border-radius: 20px;
      padding: 2rem;
      max-width: 360px;
      margin: auto;
      background: none;
      text-align: center;
    }
    .profile-img {
      width: 120px;
      height: 150px;
      object-fit: cover;
      border-radius: 15px;
      border: 4px solid white;
      margin: 1rem auto;
    }
    .menu-icon {
      font-size: 2rem;
      color: #333;
    }
    .menu-btn {
      background: white;
      color: black;
      padding: 1rem;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      min-width: 90px;
    }
    .menu-label {
      font-size: 0.85rem;
      margin-top: 0.5rem;
    }
    .bottom-link {
      font-size: 0.85rem;
      color: #ffffff;
    }
    .bottom-link a {
      color: #fff;
      text-decoration: underline;
    }
    .logo {
      width: 40px;
    }
  </style>
</head>
<body>

  <div class="card-custom pt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex text-center">
            <div class="text-center">
                <img src="/images/wings-logo.png" alt="Logo" class="logo mt-1 me-2">
            </div>
            <div class="text-center align-center">
                <h6 class="mt-1 mb-1 align-center">Wings Corp</h6>
            </div>
        </div>
         <form action="{{ route('logout') }}" method="POST" class="ml-3">
            @csrf
            <button type="submit" class="d-inline" style="background: none; border:none;"><i class="fa fa-sign-out pull-right text-light" style="font-size: 1.5rem;"></i></button>
        </form>
    </div>

    <h4 class="fw-bold mb-3">Selamat Datang,</h4>
    <div style="display: flex; justify-content: center;" class="p-4">
        @if (!$user['images'])     
        <div class="align-center rounded d-block" 
            style="
            width:80%;
            height:200px;
            background-image: url('../public/images/user.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            " >
        </div>  
        @elseif ($user['images'])
        <div class="align-center bg bg-light rounded d-block" 
            style="
            width:80%;
            height:200px;
            background-image: url('https://monitoringbbm.com/files/{{ $user['images'] }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            " >
        </div>  
        @endif
    </div>

    <h5 class="fw-bold">{{ strtoupper($user['name']) }}</h5>
    <p class="mb-1">{{ $user['nik'] }}</p>
    <p class="fw-semibold">{{ strtoupper($user['status']) }}</p>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('form.create.reports') }}" style="text-decoration: none">
            <div class="text-center menu-btn mx-2">
            <img src="../public/images/icon-input.png" alt="" class="w-50">
            <div class="menu-label">Input Laporan</div>
            </div>
         </a>
        <a href="{{ route('user.reports', $user['id']) }}" style="text-decoration: none">
            <div class="text-center menu-btn mx-2">
              <img src="../public/images/icon-reports.jpg" alt="" class="w-50">
              <div class="menu-label">Cek Laporan</div>
            </div>
        </a>
         <a href="{{ route('edit.profil', $user['id']) }}" style="text-decoration: none">
            <div class="text-center menu-btn mx-2">
                <img src="../public/images/icon-edit-profile.webp" alt="" class="w-50">
                <div class="menu-label">Edit Data Profil</div>
            </div>
        </a>
    </div>

    <p class="bottom-link mt-4">
      Apabila ada kendala dalam aplikasi<br>
      <a href="#">Silakan Hubungi Admin</a>
    </p>
  </div>

</body>
</html>
