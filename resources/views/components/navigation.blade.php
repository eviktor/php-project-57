<nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('Task Manager') }}</span>
        </a>
        <div class="flex items-center lg:order-2">
            @guest
            <a href="{{ route('login') }}"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                {{ __('nav.login') }}
            </a>
            <a href="{{ route('register') }}"
                class="px-4 py-2 ml-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                {{ __('nav.register')  }}
            </a>
            @endguest
            @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="px-4 py-2 ml-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                {{ __('nav.logout') }}
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
            @endauth
        </div>

        @auth
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="/tasks" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                        {{ __('nav.tasks') }}
                    </a>
                </li>
                <li>
                    <a href="/task_statuses" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                        {{ __('nav.statuses') }}
                    </a>
                </li>
                <li>
                    <a href="/labels" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                        {{ __('nav.labels') }}
                    </a>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
