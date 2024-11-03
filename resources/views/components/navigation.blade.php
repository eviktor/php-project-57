<nav class="bg-gray-100 border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('Task Manager') }}</span>
        </a>
        <div class="flex items-center lg:order-2">
            @guest
            <a href="{{ route('login') }}" class="link-button">
                {{ __('Log in') }}
            </a>
            <a href="{{ route('register') }}" class="ml-2 link-button">
                {{ __('Register')  }}
            </a>
            @endguest
            @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="ml-2 link-button">
                {{ __('Log out') }}
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
            @endauth
        </div>

        @auth
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('tasks.index') }}" class="menu-button">
                        {{ __('Tasks') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('task_statuses.index') }}" class="menu-button">
                        {{ __('Statuses') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('labels.index') }}" class="menu-button">
                        {{ __('Labels') }}
                    </a>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
