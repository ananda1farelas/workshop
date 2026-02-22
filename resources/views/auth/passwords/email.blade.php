<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password - Purple Admin</title>
    
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.png') }}" />

    <style>
      .auth-form-light { background: #ffffff; border-radius: 15px; }
      .btn-gradient-primary {
        background: linear-gradient(to right, #da8cff, #9a55ff) !important;
        border: none; font-weight: bold;
      }
      .content-wrapper.auth { background: #f2edf3; }
      @media (min-width: 768px) { .border-right-md { border-right: 1px solid #e9e9e9; } }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-md-10 col-lg-8 mx-auto">
              <div class="auth-form-light text-left p-4 p-sm-5 shadow-lg">
                
                <div class="row align-items-center">
                  <div class="col-md-5 text-center mb-4 mb-md-0 border-right-md">
                    <div class="brand-logo mb-3">
                      <img src="{{ asset('template/assets/images/logo.svg') }}" alt="logo">
                    </div>
                    <h4 class="font-weight-light">Lupa Password?</h4>
                    <p class="text-muted small">Jangan khawatir! Masukkan email Anda dan kami akan kirimkan link untuk mengatur ulang password.</p>
                  </div>

                  <div class="col-md-7">
                    @if (session('status'))
                        <div class="alert alert-success small mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="pt-3 px-md-3" method="POST" action="{{ route('password.email') }}">
                      @csrf
                      
                      <div class="form-group mb-4">
                        <label class="small font-weight-bold">Alamat Email</label>
                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="email@domain.com">
                        @error('email')
                          <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                      </div>

                      <div class="mt-3 d-grid">
                        <button type="submit" class="btn btn-gradient-primary btn-lg auth-form-btn text-white">
                          KIRIM LINK RESET
                        </button>
                      </div>

                      <div class="text-center mt-4 font-weight-light">
                        Ingat passwordnya? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Kembali ke Login</a>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>