<!DOCTYPE html>
<html lang="en">
@extends('head')

<div class="row justify-content-center" id="auth-form">
    <div class="col-md-5">
        @if (session()->has('loginError'))
            <div class="alert 
              alert-danger 
              alert-dismissible 
              fade show"
                role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <main class="form-signin">
            <h1 class="mb-3 fw-normal text-center text-black">
                SIMI ADMIN
            </h1>

            <hr class="sidebar-divider">

            @if (session()->has('success'))                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email"
                        class="
                        form-control
                        rounded 
                        @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">
                        Alamat Email
                    </label>
                    @error('email')
                        <div class="div-invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mt-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                    <label for="password">
                        Kata Sandi
                    </label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">
                    Masuk
                </button>
                <hr class="sidebar-divider">
            </form>

            <a href="register" class="w-100 btn btn-lg btn-primary">
                Klik Di Sini Untuk Daftar
            </a>

            <div class="container my-3">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy;
                        <a href="https://steamcommunity.com/id/Agalondia/">SIMI Dev Team&trade;</a> 2022</span>
                </div>
            </div>
        </main>
    </div>
</div>

</html>
