@extends('layouts.app')

@section('title', 'Login Form')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .form-wrapper {
            box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;
            padding: 5rem 3rem;
            max-width: 600px;
            /* Moved max-width here for better organization */
            margin: 0 auto;
        }

        .form-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
            text-decoration: none;
        }

        .form {
            padding: 120px 0;
        }

        .reg {
            color: blue;
        }

        .error {
            color: red;
            /* Style for error messages */
        }
    </style>

    <section class="form">
        <div class="container">
            <!-- Student Form -->
            <div class="form-wrapper" id="student-form">
                <form class="row g-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="text-center mb-3">Login</h3>
                    @if (Session::has('success'))
                        <script>
                            // alert("ok");
                            Toastify({
                                text: "{{ session('success') }}",
                                duration: 5000,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                backgroundColor: "#4CAF50",
                            }).showToast();
                            // This part will be rendered only if there are errors
                        </script>
                    @endif
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            required value="{{ old('email') }}">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required>
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 form-btn">
                        <button type="submit" class="btn btn-primary w-25">Login</button>
                        <p>Don't have an account? Please <a class="reg" href="{{ route('register') }}">Register</a></p>
                    </div>
                    <div class="col-12 form-btn">
                        <p>Forgot Password? Please <a class="reg" href="{{ route('password.request') }}">Reset</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
