<x-layouts.whole-page :title="$title ?? null" :description="$description ?? null">
    <div class="flex h-screen justify-center items-center">
        <div class="border-2 border-gray w-2/5">
            <div class="p-2 bg-gray-200 flex items-center">
                <img class="h-16 m-2" src="/images/trotter-logo.svg"/>
                <h1 class="text-5xl font-bold inline ml-2">Trotter Login</h1>
            </div>

            <div class="p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email">E-Mail</label>

                        <div>
                            <input id="email" type="email" class="w-full p-2 border-2 border-gray mt-1 text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password">Password</label>

                        <div>
                            <input id="password" type="password" class="w-full p-2 border-2 border-gray mt-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember">
                            Remember Me
                        </label>
                    </div>

                    <div class="mt-1">
                        <button class="w-full bg-red-300 p-2" type="submit">
                            Submit
                        </button>

                        @if (Route::has('password.request'))
                            <div class="text-sm	mt-1">
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.whole-page>
