<!DOCTYPE html>
<html lang="en">
@extends('head')

<div class="row justify-content-center" id="auth-form">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="mb-3 fw-normal text-center text-black">
                SIMI ADMIN
            </h1>

            <hr class="sidebar-divider">

            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input 
                        type="text" 
                        name="name" 
                        class="
                            form-control
                            rounded 
                            @error('name')
                                is-invalid                          
                            @enderror"
                        id="name" 
                        placeholder="Put Your Name Here!"
                        required
                        value="{{ old('name') }}"
                        autofocus>

                    <label for="name">
                        Nama
                    </label>

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                            
                    @enderror
                </div>
                <div class="form-floating mt-2">
                    <input 
                    type="email" 
                    name="email" 
                    class="
                        form-control
                        rounded 
                        @error('email')is-invalid                          
                        @enderror"  
                    id="email" 
                    placeholder="name@example.com"
                    required
                    value="{{ old('email') }}">

                    <label for="email">
                        Alamat Email
                    </label>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                            
                    @enderror
                </div>

                <div class="form-floating mt-2">
                    <input 
                    type="password" 
                    name="password" 
                    class="
                        form-control
                        rounded 
                        @error('password')is-invalid                          
                        @enderror"
                    id="password" 
                    placeholder="Password"
                    required
                    value="{{ old('password') }}">

                    <label for="password">
                      Kata Sandi
                    </label>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>                            
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
                    Daftar
                </button>

                <hr class="sidebar-divider">

                </form>
                <a href="/" class="w-100 btn btn-lg btn-primary">
                    Klik Disini Untuk Masuk
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