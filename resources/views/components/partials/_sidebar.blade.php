<nav class="p-6">
    <img class="h-20" src="/images/trotter-logo.svg"/>

    <ul>
        <li>
            <a class="font-bold text-5xl mt-4 block" href="{{ route('home') }}">Home</a>
        </li>

        <li>
            <a class="font-bold text-5xl mt-4 block" href="{{ route('user', ['user' => Auth::user()->username]) }}">Profile</a>
        </li>

        <li>
            <a class="font-bold text-5xl mt-4 block" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                Logout
            </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</nav>
