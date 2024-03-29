<!DOCTYPE html>
<html lang="en" class="dark">

<head class="dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UP AUTH | Auth AAS</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-900 text-white">
    <header>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/user/api-tokens') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>

        @endif
    </header>

    <div class="mt-16 w-full dark">
        <h1 class="px-7 text-center text-3xl" style="margin-top: 20vh">
            Username Password Auth is an Authentication as a Service
        </h1>
        <div class="px-3 md:px-16 lg:px-24 ">
            <h3 class="mt-3 text-xl text-center">The objective is to provide a simple and easy to integrate,
                username/password authentication service.</h3>
            <h3 class="mt-16 text-xl">MOTIVATION</h3>
            <p>I once try to implement an SPA with extremely simple authentication, but i cannot find any Auth service
                with
                my simple requirement.</p>
            <p>Every authentication provider includes email/phone authentication and multiple SSO, along with anonymous
                auth by
                some.</p>
            <p>And i cannot find one which provider username, password authentication</p>
            <p>This auth service will provide exactly what I've wanted!</p>
            <h3 class="mt-5 text-xl">HOW TO USE</h3>

            <div class="">

                <div class="flex -mx-2 flex-wrap ">
                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="bg-gray-500">
                            <h5 class="text-lg text-center">INTRODUCTION</h5>
                        </div>
                        <div>
                            <ul>
                                <li>- Register your project</li>
                                <li>- Generate a token</li>
                                <li>- Keep the token safe</li>
                            </ul>
                        </div>
                    </div>
                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="">
                            <h5 class="bg-gray-500 text-lg text-center">REGISTRATION</h5>

                        </div>
                        <div>
                            <ul>
                                <li>- endpoint[POST]: <code>/api/register</code></li>
                                <li>- Authorization Bearer token is required</li>
                                <li>- requried form_fields:
                                    <ol class="pl-7">
                                        <li>username</li>
                                        <li>password</li>
                                        <li>password_confirmation</li>
                                    </ol>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="bg-gray-500">
                            <h5 class="text-lg text-center">AUTHENTICATION</h5>
                        </div>
                        <div>
                            <ol>
                                <li>- endpoint[POST]: /api/login</li>
                                <li>- Authorization Bearer token is required</li>
                                <li>- requried form_fields:
                                    <ol class="pl-7">
                                        <li>username</li>
                                        <li>password</li>
                                    </ol>
                                </li>
                                <li>
                                    - [RESPONSE]: Plain Text Token for the authorized user will be returned
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="bg-gray-500">
                            <h5 class="text-center text-lg">
                                UTILIZATION
                            </h5>
                        </div>
                        <div>
                            <ol>
                                <li>- endpoint: [GET]: /api/user</li>
                                <li>- Authorization Bearer token is required</li>
                                <li>- Authorized user details will be returned</li>
                            </ol>
                        </div>
                    </div>

                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="bg-gray-500">
                            <h5 class="text-center text-lg">
                                MANIPULATION
                            </h5>
                        </div>
                        <div>
                            <ol>
                                <li>- endpoint: [GET]: /api/users/<i
                                        class="text-green-500 font-extrabold font-mono">USER_ID</i>
                                </li>
                                <li>- Authorization Bearer token is required</li>
                                <li>- [RESPONSE]Authorized user details will be returned</li>
                            </ol>
                        </div>
                    </div>

                    <div class=" w-full lg:w-1/2  p-2">
                        <div class="bg-gray-500">
                            <h5 class="text-center text-lg">
                                DESTRUCTION
                            </h5>
                        </div>
                        <div>
                            <ol>
                                <li>- endpoint: [DELETE]: /api/users/<i
                                        class="text-green-500 font-extrabold font-mono">USER_ID</i>
                                </li>
                                <li>- Authorization Bearer token is required</li>
                                <li>- The utilization of any resource related to the user will no longer be available.
                                </li>
                                {{-- <li>- [RESPONSE]Authorized user details will be returned</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <h3 class="mt-5 text-xl">INTEGRATION</h3>
            <ol>
                <li>- Register your project</li>
                <li>- Generate an api key</li>
                <li>- This token will be used to register a new user to your app</li>

                <li>- Pass the token as Authorization Bearer (when a new user is being created)</li>
                <li>- Payload for user registration requries the following fields:
                    <ol class="pl-3">
                        <li>-  1. username</li>
                        <li>-  2. password</li>
                        <li>- 3. password_confirmation</li>
                    </ol>
                </li>
                <li>- VIOLA. A new user has been created.</li>
                <li>- The user can now logged in using the credentials provided</li>
                <li>- A plain text token will be returned on authentication</li>
                <li>- Save the token in locastorage.</li>
                <li>- The token will be necessary to fetch/update user's data</li>
            </ol> --}}
            <h3 class="mt-5 text-xl">WHAT GOES AROUND COMES AROUND</h3>
            <div class="pb-5">
                Feel free to clone and use the project your own. It is okay to upgrade and for commercial usage, nothing
                is
                prohibited on my side. No credit required
            </div>
        </div>
        <div class="fixed bottom-0 right-0 p-3">
            <a href="https://github.com/blalmal10a/up-auth" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="48px" height="48px">
                    <linearGradient id="KpzH_ttTMIjq8dhx1zD2pa" x1="30.999" x2="30.999" y1="16"
                        y2="55.342" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#6dc7ff"></stop>
                        <stop offset="1" stop-color="#e6abff"></stop>
                    </linearGradient>
                    <path fill="url(#KpzH_ttTMIjq8dhx1zD2pa)"
                        d="M25.008,56.007c-0.003-0.368-0.006-1.962-0.009-3.454l-0.003-1.55 c-6.729,0.915-8.358-3.78-8.376-3.83c-0.934-2.368-2.211-3.045-2.266-3.073l-0.124-0.072c-0.463-0.316-1.691-1.157-1.342-2.263 c0.315-0.997,1.536-1.1,2.091-1.082c3.074,0.215,4.63,2.978,4.694,3.095c1.569,2.689,3.964,2.411,5.509,1.844 c0.144-0.688,0.367-1.32,0.659-1.878C20.885,42.865,15.27,40.229,15.27,30.64c0-2.633,0.82-4.96,2.441-6.929 c-0.362-1.206-0.774-3.666,0.446-6.765l0.174-0.442l0.452-0.144c0.416-0.137,2.688-0.624,7.359,2.433 c1.928-0.494,3.969-0.749,6.074-0.759c2.115,0.01,4.158,0.265,6.09,0.759c4.667-3.058,6.934-2.565,7.351-2.433l0.451,0.145 l0.174,0.44c1.225,3.098,0.813,5.559,0.451,6.766c1.618,1.963,2.438,4.291,2.438,6.929c0,9.591-5.621,12.219-10.588,13.087 c0.563,1.065,0.868,2.402,0.868,3.878c0,1.683-0.007,7.204-0.015,8.402l-2-0.014c0.008-1.196,0.015-6.708,0.015-8.389 c0-2.442-0.943-3.522-1.35-3.874l-1.73-1.497l2.274-0.253c5.205-0.578,10.525-2.379,10.525-11.341c0-2.33-0.777-4.361-2.31-6.036 l-0.43-0.469l0.242-0.587c0.166-0.401,0.894-2.442-0.043-5.291c-0.758,0.045-2.568,0.402-5.584,2.447l-0.384,0.259l-0.445-0.123 c-1.863-0.518-3.938-0.796-6.001-0.806c-2.052,0.01-4.124,0.288-5.984,0.806l-0.445,0.123l-0.383-0.259 c-3.019-2.044-4.833-2.404-5.594-2.449c-0.935,2.851-0.206,4.892-0.04,5.293l0.242,0.587l-0.429,0.469 c-1.536,1.681-2.314,3.712-2.314,6.036c0,8.958,5.31,10.77,10.504,11.361l2.252,0.256l-1.708,1.49 c-0.372,0.325-1.03,1.112-1.254,2.727l-0.075,0.549l-0.506,0.227c-1.321,0.592-5.839,2.162-8.548-2.485 c-0.015-0.025-0.544-0.945-1.502-1.557c0.646,0.639,1.433,1.673,2.068,3.287c0.066,0.19,1.357,3.622,7.28,2.339l1.206-0.262 l0.012,3.978c0.003,1.487,0.006,3.076,0.009,3.444L25.008,56.007z">
                    </path>
                    <linearGradient id="KpzH_ttTMIjq8dhx1zD2pb" x1="32" x2="32" y1="5"
                        y2="59.167" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#1a6dff"></stop>
                        <stop offset="1" stop-color="#c822ff"></stop>
                    </linearGradient>
                    <path fill="url(#KpzH_ttTMIjq8dhx1zD2pb)"
                        d="M32,58C17.663,58,6,46.337,6,32S17.663,6,32,6s26,11.663,26,26S46.337,58,32,58z M32,8 C18.767,8,8,18.767,8,32s10.767,24,24,24s24-10.767,24-24S45.233,8,32,8z">
                    </path>
                </svg>
            </a>
        </div>
    </div>

</body>

</html>
