<x-layouts.app :title="$title ?? null" :description="$description ?? null">
    <div class="flex h-screen justify-center items-center">
        <div class="border-2 border-gray w-2/5">
            <div class="p-2 bg-gray-200 flex items-center">
                <img class="h-16 m-2" src="/images/trotter-logo.svg"/>
                <h1 class="text-5xl font-bold inline ml-2">Trotter Registration</h1>
            </div>
            
            <div class="p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name">Name</label>

                        <div>
                            <input id="name" type="text" class="w-full p-2 border-2 border-gray mt-1  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email">E-Mail</label>

                        <div>
                            <input id="email" type="email" class="w-full p-2 border-2 border-gray mt-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="w-full p-2 border-2 border-gray mt-1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="w-full p-2 border-2 border-gray mt-1" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="mt-4">
                            <button type="submit" class="w-full bg-red-300 p-2">
                                Register
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
