
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

    <title>login</title>
</head>
<body>
<section class="vh-100" style="background-color: #1d1d1d">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://images.unsplash.com/photo-1636942810142-df7b913aae16?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3Ds"
                   alt="login form"
                   class="img-fluid"
                   style="border-radius: 1rem 0 0 1rem;" />
            </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center" style="background-color: #020101">
              <div class="card-body p-4 p-lg-5" style="color: #d8d8d8">

                <form method="post" action="{{ route('login.store') }}">
                    @csrf
                    @method('POST')

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Give Yourself a Shelter</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                    Sign into your account
                  </h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control form-control-lg"
                           style="background-color: #d8d8d8"
                           value="{{ old('email') }}" />
                        <x-error name="email"></x-error>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control form-control-lg"
                           style="background-color: #d8d8d8" />

                    <x-error name="password"></x-error>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-dark btn-lg btn-block"
                            type="submit">
                        Login
                    </button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">
                    Don't have an account?
                    <a href="#!" style="color: #393f81;">Register here</a>
                  </p>

                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>