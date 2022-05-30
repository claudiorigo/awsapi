<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#0070ac">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>

                                <div class="relative pt-1">
                                    <div class="flex mb-2 items-center justify-between">
                                      <div>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200">
                                          Tarea en proceso
                                        </span>
                                      </div>
                                      <div class="text-right">
                                        <span class="text-xs font-semibold inline-block text-blue-600">
                                          50%
                                        </span>
                                      </div>
                                    </div>
                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                      <div style="width:50%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>

                            <a href="https://claudiorigollet.cl/api/documentation" class="flex ml-1 underline">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 120 100" class="ml-4 -mt-px w-8 h-5">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            clip-path: url(#clip-SW_TM-logo-on-dark);
                                        }
                                
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                
                                        .cls-3 {
                                          fill: #85ea2d;
                                        }
                                
                                        .cls-4 {
                                            fill: #173647;
                                        }
                                    </style>
                                    <clipPath id="clip-SW_TM-logo-on-dark">
                                      <rect width="120" height="100"/>
                                    </clipPath>
                                </defs>
                                <g id="SW_TM-logo-on-dark" class="cls-1">
                                    <g id="SW_In-Product" transform="translate(-0.301)">
                                      <path id="Path_2936" data-name="Path 2936" class="cls-2" d="M359.15,70.674h-.7V66.992h-1.26v-.6h3.219v.6H359.15Z"/>
                                      <path id="Path_2937" data-name="Path 2937" class="cls-2" d="M363.217,70.674,361.975,67.1h-.023q.05.8.05,1.494v2.083h-.636V66.391h.987l1.19,3.407h.017l1.225-3.407h.99v4.283H365.1V68.556c0-.213.006-.49.016-.832s.02-.549.028-.621h-.023l-1.286,3.571Z"/>
                                      <path id="Path_2938" data-name="Path 2938" class="cls-3" d="M50.328,97.669A47.642,47.642,0,1,1,97.971,50.027,47.642,47.642,0,0,1,50.328,97.669Z"/>
                                      <path id="Path_2939" data-name="Path 2939" class="cls-3" d="M50.328,4.769A45.258,45.258,0,1,1,5.07,50.027,45.258,45.258,0,0,1,50.328,4.769m0-4.769a50.027,50.027,0,1,0,50.027,50.027A50.027,50.027,0,0,0,50.328,0Z"/>
                                      <path id="Path_2940" data-name="Path 2940" class="cls-4" d="M31.8,33.854c-.154,1.712.058,3.482-.057,5.213a42.665,42.665,0,0,1-.693,5.156,9.53,9.53,0,0,1-4.1,5.829c4.079,2.654,4.54,6.771,4.81,10.946.135,2.25.077,4.52.308,6.752.173,1.731.846,2.174,2.636,2.231.73.02,1.48,0,2.327,0V75.33c-5.29.9-9.657-.6-10.734-5.079a30.76,30.76,0,0,1-.654-5c-.117-1.789.076-3.578-.058-5.367-.386-4.906-1.02-6.56-5.713-6.791v-6.1A9.191,9.191,0,0,1,20.9,46.82c2.577-.135,3.674-.924,4.231-3.463a29.3,29.3,0,0,0,.481-4.329,82.1,82.1,0,0,1,.6-8.406c.673-3.982,3.136-5.906,7.234-6.137,1.154-.057,2.327,0,3.655,0v5.464c-.558.038-1.039.115-1.539.115C32.226,29.949,32.052,31.084,31.8,33.854Zm6.406,12.658h-.077a3.515,3.515,0,1,0-.346,7.021h.231a3.461,3.461,0,0,0,3.655-3.251V50.09a3.523,3.523,0,0,0-3.461-3.578Zm12.062,0a3.373,3.373,0,0,0-3.482,3.251,1.79,1.79,0,0,0,.02.327,3.3,3.3,0,0,0,3.578,3.443,3.263,3.263,0,0,0,3.443-3.558,3.308,3.308,0,0,0-3.557-3.463Zm12.351,0a3.592,3.592,0,0,0-3.655,3.482A3.529,3.529,0,0,0,62.5,53.533h.039c1.769.309,3.559-1.4,3.674-3.462a3.571,3.571,0,0,0-3.6-3.559Zm16.948.288c-2.232-.1-3.348-.846-3.9-2.962a21.447,21.447,0,0,1-.635-4.136c-.154-2.578-.135-5.175-.308-7.753-.4-6.117-4.828-8.252-11.254-7.195v5.31c1.019,0,1.808,0,2.6.019,1.366.019,2.4.539,2.539,2.059.135,1.385.135,2.789.27,4.193.269,2.79.422,5.618.9,8.369A8.715,8.715,0,0,0,73.7,50.052c-3.4,2.289-4.406,5.559-4.578,9.234-.1,2.52-.154,5.059-.289,7.6-.115,2.308-.923,3.058-3.251,3.116-.654.019-1.289.077-2.019.115v5.445c1.365,0,2.616.077,3.866,0,3.886-.231,6.233-2.117,7-5.887A49.079,49.079,0,0,0,75,63.4c.135-1.923.116-3.866.308-5.771.289-2.982,1.655-4.213,4.636-4.4a4.037,4.037,0,0,0,.828-.192v-6.1c-.5-.058-.843-.115-1.208-.135Z"/>
                                      <path id="Path_2941" data-name="Path 2941" class="cls-2" d="M152.273,58.122a11.228,11.228,0,0,1-4.384,9.424q-4.383,3.382-11.9,3.382-8.14,0-12.524-2.1V63.7a32.9,32.9,0,0,0,6.137,1.879,32.3,32.3,0,0,0,6.575.689q5.322,0,8.015-2.02a6.626,6.626,0,0,0,2.692-5.62,7.222,7.222,0,0,0-.954-3.9,8.885,8.885,0,0,0-3.194-2.8,44.634,44.634,0,0,0-6.81-2.911q-6.387-2.286-9.126-5.417a11.955,11.955,0,0,1-2.74-8.172A10.164,10.164,0,0,1,128.039,27q3.977-3.131,10.52-3.131a31,31,0,0,1,12.555,2.5L149.455,31a28.382,28.382,0,0,0-11.021-2.38,10.668,10.668,0,0,0-6.606,1.816,5.984,5.984,0,0,0-2.38,5.041,7.722,7.722,0,0,0,.877,3.9,8.242,8.242,0,0,0,2.959,2.786,36.7,36.7,0,0,0,6.371,2.8q7.2,2.566,9.91,5.51A10.84,10.84,0,0,1,152.273,58.122Z"/>
                                      <path id="Path_2942" data-name="Path 2942" class="cls-2" d="M185.288,70.3,179,50.17q-.594-1.848-2.222-8.391h-.251q-1.252,5.479-2.192,8.453L167.849,70.3h-6.011l-9.361-34.315h5.447q3.318,12.931,5.057,19.693a80.112,80.112,0,0,1,1.988,9.111h.25q.345-1.785,1.112-4.618t1.33-4.493l6.294-19.693h5.635l6.137,19.693a66.369,66.369,0,0,1,2.379,9.048h.251a33.163,33.163,0,0,1,.673-3.475q.548-2.347,6.528-25.266h5.385L191.456,70.3Z"/>
                                      <path id="Path_2943" data-name="Path 2943" class="cls-2" d="M225.115,70.3l-1.033-4.885h-.25a14.446,14.446,0,0,1-5.119,4.368,15.608,15.608,0,0,1-6.372,1.143q-5.1,0-8-2.63t-2.9-7.483q0-10.4,16.626-10.9l5.823-.188V47.6q0-4.038-1.738-5.964T216.6,39.713a22.633,22.633,0,0,0-9.706,2.63l-1.6-3.977a24.437,24.437,0,0,1,5.557-2.16,24.056,24.056,0,0,1,6.058-.783q6.136,0,9.1,2.724t2.959,8.735V70.3Zm-11.741-3.663A10.549,10.549,0,0,0,221,63.977a9.845,9.845,0,0,0,2.771-7.451v-3.1l-5.2.219q-6.2.219-8.939,1.926a5.8,5.8,0,0,0-2.74,5.306,5.354,5.354,0,0,0,1.707,4.29,7.081,7.081,0,0,0,4.775,1.472Z"/>
                                      <path id="Path_2944" data-name="Path 2944" class="cls-2" d="M264.6,35.987v3.287l-6.356.752a11.16,11.16,0,0,1,2.255,6.856,10.148,10.148,0,0,1-3.444,8.047q-3.444,3-9.456,3a15.734,15.734,0,0,1-2.88-.25Q241.4,59.438,241.4,62.1a2.242,2.242,0,0,0,1.159,2.082,8.456,8.456,0,0,0,3.976.673h6.074q5.573,0,8.563,2.348a8.158,8.158,0,0,1,2.99,6.825,9.743,9.743,0,0,1-4.571,8.688q-4.572,2.989-13.338,2.99-6.732,0-10.379-2.5a8.087,8.087,0,0,1-3.647-7.076,7.946,7.946,0,0,1,2-5.417,10.211,10.211,0,0,1,5.636-3.1,5.429,5.429,0,0,1-2.207-1.847,4.89,4.89,0,0,1-.893-2.912,5.53,5.53,0,0,1,1-3.288,10.529,10.529,0,0,1,3.162-2.723,9.275,9.275,0,0,1-4.336-3.726,10.945,10.945,0,0,1-1.675-6.012q0-5.634,3.382-8.688t9.58-3.052a17.439,17.439,0,0,1,4.853.626ZM237.233,76.062a4.66,4.66,0,0,0,2.348,4.227,12.973,12.973,0,0,0,6.732,1.44q6.543,0,9.69-1.956a5.992,5.992,0,0,0,3.147-5.307q0-2.787-1.723-3.867t-6.481-1.08h-6.23a8.205,8.205,0,0,0-5.51,1.69,6.043,6.043,0,0,0-1.973,4.853Zm2.818-29.086a6.984,6.984,0,0,0,2.035,5.448,8.123,8.123,0,0,0,5.667,1.847q7.608,0,7.608-7.389,0-7.733-7.7-7.733a7.628,7.628,0,0,0-5.635,1.972q-1.976,1.973-1.975,5.855Z"/>
                                      <path id="Path_2945" data-name="Path 2945" class="cls-2" d="M299.136,35.987v3.287l-6.356.752a11.168,11.168,0,0,1,2.254,6.856,10.145,10.145,0,0,1-3.444,8.047q-3.444,3-9.455,3a15.734,15.734,0,0,1-2.88-.25q-3.32,1.754-3.319,4.415a2.243,2.243,0,0,0,1.158,2.082,8.459,8.459,0,0,0,3.976.673h6.074q5.574,0,8.563,2.348a8.158,8.158,0,0,1,2.99,6.825,9.743,9.743,0,0,1-4.571,8.688q-4.57,2.989-13.337,2.99-6.732,0-10.379-2.5a8.088,8.088,0,0,1-3.648-7.076,7.947,7.947,0,0,1,2-5.417,10.207,10.207,0,0,1,5.636-3.1,5.432,5.432,0,0,1-2.208-1.847,4.889,4.889,0,0,1-.892-2.912,5.53,5.53,0,0,1,1-3.288,10.529,10.529,0,0,1,3.162-2.723,9.271,9.271,0,0,1-4.336-3.726,10.945,10.945,0,0,1-1.675-6.012q0-5.634,3.381-8.688t9.581-3.052a17.444,17.444,0,0,1,4.853.626ZM271.772,76.062a4.658,4.658,0,0,0,2.348,4.227,12.969,12.969,0,0,0,6.731,1.44q6.544,0,9.691-1.956a5.993,5.993,0,0,0,3.146-5.307q0-2.787-1.722-3.867t-6.481-1.08h-6.23a8.208,8.208,0,0,0-5.511,1.69A6.042,6.042,0,0,0,271.772,76.062Zm2.818-29.086a6.984,6.984,0,0,0,2.035,5.448,8.121,8.121,0,0,0,5.667,1.847q7.607,0,7.608-7.389,0-7.733-7.7-7.733a7.629,7.629,0,0,0-5.635,1.972q-1.975,1.973-1.975,5.855Z"/>
                                      <path id="Path_2946" data-name="Path 2946" class="cls-2" d="M316.778,70.928q-7.608,0-12.007-4.634t-4.4-12.868q0-8.3,4.086-13.181a13.573,13.573,0,0,1,10.974-4.884A12.938,12.938,0,0,1,325.638,39.6q3.762,4.247,3.762,11.2v3.287H305.757q.156,6.044,3.053,9.174t8.156,3.131a27.633,27.633,0,0,0,10.958-2.317v4.634a27.5,27.5,0,0,1-5.213,1.706,29.251,29.251,0,0,1-5.933.513Zm-1.409-31.215a8.489,8.489,0,0,0-6.591,2.692,12.416,12.416,0,0,0-2.9,7.452h17.94q0-4.916-2.191-7.53a7.714,7.714,0,0,0-6.258-2.614Z"/>
                                      <path id="Path_2947" data-name="Path 2947" class="cls-2" d="M350.9,35.361a20.38,20.38,0,0,1,4.1.375l-.721,4.822a17.712,17.712,0,0,0-3.757-.47A9.142,9.142,0,0,0,343.4,43.47a12.327,12.327,0,0,0-2.959,8.422V70.3h-5.2V35.987h4.29l.6,6.356h.25a15.072,15.072,0,0,1,4.6-5.166,10.356,10.356,0,0,1,5.919-1.816Z"/>
                                      <path id="Path_2948" data-name="Path 2948" class="cls-2" d="M255.857,96.638s-3.43-.391-4.85-.391c-2.058,0-3.111.735-3.111,2.18,0,1.568.882,1.935,3.748,2.719,3.527.98,4.8,1.911,4.8,4.777,0,3.675-2.3,5.267-5.61,5.267a35.687,35.687,0,0,1-5.487-.662l.27-2.18s3.306.441,5.046.441c2.082,0,3.037-.931,3.037-2.7,0-1.421-.759-1.91-3.331-2.523-3.626-.93-5.193-2.033-5.193-4.948,0-3.381,2.229-4.776,5.585-4.776a37.2,37.2,0,0,1,5.315.587Z"/>
                                      <path id="Path_2949" data-name="Path 2949" class="cls-2" d="M262.967,94.14H267.7l3.748,13.106L275.2,94.14h4.752v16.78H277.2V96.42h-.145l-4.191,13.816h-2.842L265.831,96.42h-.145v14.5h-2.719Z"/>
                                      <path id="Path_2950" data-name="Path 2950" class="cls-2" d="M322.057,94.14H334.3v2.425h-4.728V110.92h-2.743V96.565h-4.777Z"/>
                                      <path id="Path_2951" data-name="Path 2951" class="cls-2" d="M346.137,94.14c3.332,0,5.12,1.249,5.12,4.361,0,2.033-.637,3.037-1.984,3.772,1.445.563,2.4,1.592,2.4,3.9,0,3.43-2.081,4.752-5.339,4.752h-6.566V94.14Zm-3.65,2.352v4.8h3.6c1.666,0,2.4-.832,2.4-2.474,0-1.617-.833-2.327-2.5-2.327Zm0,7.1v4.973h3.7c1.689,0,2.694-.539,2.694-2.548,0-1.911-1.421-2.425-2.744-2.425Z"/>
                                      <path id="Path_2952" data-name="Path 2952" class="cls-2" d="M358.414,94.14H369v2.377h-7.864v4.751h6.394V103.6h-6.394v4.924H369v2.4H358.414Z"/>
                                      <path id="Path_2953" data-name="Path 2953" class="cls-2" d="M378.747,94.14h5.414l4.164,16.78h-2.744L384.342,106h-5.777l-1.239,4.923h-2.719Zm.361,9.456h4.708l-1.737-7.178h-1.225Z"/>
                                      <path id="Path_2954" data-name="Path 2954" class="cls-2" d="M397.1,105.947v4.973h-2.719V94.14h6.37c3.7,0,5.683,2.12,5.683,5.843,0,2.376-.956,4.519-2.744,5.352l2.769,5.585H403.47l-2.426-4.973Zm3.651-9.455H397.1v7.1h3.7c2.057,0,2.841-1.85,2.841-3.589,0-1.9-.934-3.511-2.894-3.511Z"/>
                                      <path id="Path_2955" data-name="Path 2955" class="cls-2" d="M290.013,94.14h5.413l4.164,16.78h-2.743L295.608,106h-5.777l-1.239,4.923h-2.719Zm.361,9.456h4.707l-1.737-7.178h-1.225Z"/>
                                      <path id="Path_2956" data-name="Path 2956" class="cls-2" d="M308.362,105.947v4.973h-2.719V94.14h6.369c3.7,0,5.683,2.12,5.683,5.843,0,2.376-.955,4.519-2.743,5.352l2.768,5.585h-2.989l-2.425-4.973Zm3.65-9.455h-3.65v7.1h3.7c2.058,0,2.841-1.85,2.841-3.589C314.9,98.1,313.972,96.492,312.012,96.492Z"/>
                                      <path id="Path_2957" data-name="Path 2957" class="cls-2" d="M130.606,107.643a3.02,3.02,0,0,1-1.18,2.537,5.113,5.113,0,0,1-3.2.91,8.03,8.03,0,0,1-3.371-.564v-1.383a8.793,8.793,0,0,0,1.652.506,8.672,8.672,0,0,0,1.77.186,3.565,3.565,0,0,0,2.157-.544,1.783,1.783,0,0,0,.725-1.512,1.947,1.947,0,0,0-.257-1.05,2.393,2.393,0,0,0-.86-.754,12.171,12.171,0,0,0-1.833-.784,5.842,5.842,0,0,1-2.456-1.458,3.213,3.213,0,0,1-.738-2.2,2.736,2.736,0,0,1,1.071-2.267,4.444,4.444,0,0,1,2.831-.843,8.341,8.341,0,0,1,3.38.675l-.447,1.247a7.639,7.639,0,0,0-2.966-.641,2.878,2.878,0,0,0-1.779.489,1.612,1.612,0,0,0-.64,1.357,2.081,2.081,0,0,0,.236,1.049,2.231,2.231,0,0,0,.8.75,9.878,9.878,0,0,0,1.715.754,6.8,6.8,0,0,1,2.667,1.483,2.919,2.919,0,0,1,.723,2.057Z"/>
                                      <path id="Path_2958" data-name="Path 2958" class="cls-2" d="M134.447,101.686v5.991a2.411,2.411,0,0,0,.515,1.686,2.09,2.09,0,0,0,1.609.556,2.629,2.629,0,0,0,2.12-.792,4,4,0,0,0,.67-2.587v-4.854h1.4v9.236H139.6l-.2-1.239h-.075a2.793,2.793,0,0,1-1.193,1.045,4,4,0,0,1-1.74.362,3.529,3.529,0,0,1-2.524-.8,3.409,3.409,0,0,1-.839-2.562v-6.042Z"/>
                                      <path id="Path_2959" data-name="Path 2959" class="cls-2" d="M148.206,111.09a3.993,3.993,0,0,1-1.647-.333,3.1,3.1,0,0,1-1.252-1.023h-.1a12.265,12.265,0,0,1,.1,1.533v3.8h-1.4V101.686h1.137l.194,1.264h.067a3.257,3.257,0,0,1,1.256-1.1,3.831,3.831,0,0,1,1.643-.337,3.413,3.413,0,0,1,2.836,1.256,6.683,6.683,0,0,1-.017,7.057,3.42,3.42,0,0,1-2.817,1.264Zm-.2-8.385a2.482,2.482,0,0,0-2.048.784,4.041,4.041,0,0,0-.649,2.494v.312a4.625,4.625,0,0,0,.649,2.785,2.467,2.467,0,0,0,2.082.839,2.164,2.164,0,0,0,1.875-.969,4.6,4.6,0,0,0,.678-2.671,4.428,4.428,0,0,0-.678-2.651,2.232,2.232,0,0,0-1.915-.923Z"/>
                                      <path id="Path_2960" data-name="Path 2960" class="cls-2" d="M159.039,111.09a3.993,3.993,0,0,1-1.647-.333,3.1,3.1,0,0,1-1.252-1.023h-.1a12.265,12.265,0,0,1,.1,1.533v3.8h-1.4V101.686h1.137l.194,1.264h.067a3.257,3.257,0,0,1,1.256-1.1,3.831,3.831,0,0,1,1.643-.337,3.413,3.413,0,0,1,2.836,1.256,6.683,6.683,0,0,1-.017,7.057,3.42,3.42,0,0,1-2.817,1.264Zm-.2-8.385a2.482,2.482,0,0,0-2.048.784,4.041,4.041,0,0,0-.649,2.494v.312a4.625,4.625,0,0,0,.649,2.785,2.467,2.467,0,0,0,2.082.839,2.164,2.164,0,0,0,1.875-.969,4.6,4.6,0,0,0,.678-2.671,4.428,4.428,0,0,0-.678-2.651,2.232,2.232,0,0,0-1.911-.923Z"/>
                                      <path id="Path_2961" data-name="Path 2961" class="cls-2" d="M173.612,106.3a5.093,5.093,0,0,1-1.137,3.527,4.005,4.005,0,0,1-3.143,1.268,4.172,4.172,0,0,1-2.2-.581,3.84,3.84,0,0,1-1.483-1.669,5.8,5.8,0,0,1-.522-2.545,5.087,5.087,0,0,1,1.129-3.518,3.991,3.991,0,0,1,3.135-1.26,3.907,3.907,0,0,1,3.08,1.29,5.071,5.071,0,0,1,1.141,3.488Zm-7.036,0a4.384,4.384,0,0,0,.708,2.7,2.809,2.809,0,0,0,4.167,0,4.365,4.365,0,0,0,.712-2.7,4.293,4.293,0,0,0-.712-2.675,2.5,2.5,0,0,0-2.1-.915,2.461,2.461,0,0,0-2.072.9,4.334,4.334,0,0,0-.7,2.69Z"/>
                                      <path id="Path_2962" data-name="Path 2962" class="cls-2" d="M180.525,101.517a5.506,5.506,0,0,1,1.1.1l-.194,1.3a4.786,4.786,0,0,0-1.011-.127,2.46,2.46,0,0,0-1.917.911,3.318,3.318,0,0,0-.8,2.267v4.955h-1.4v-9.236h1.154l.16,1.71h.068a4.054,4.054,0,0,1,1.238-1.39,2.787,2.787,0,0,1,1.6-.49Z"/>
                                      <path id="Path_2963" data-name="Path 2963" class="cls-2" d="M187.363,109.936a4.506,4.506,0,0,0,.716-.055,4.387,4.387,0,0,0,.548-.114v1.07a2.5,2.5,0,0,1-.67.181,5,5,0,0,1-.8.072q-2.68,0-2.68-2.823v-5.494h-1.323V102.1l1.323-.582.59-1.972h.809v2.141h2.68v1.087h-2.68v5.435a1.869,1.869,0,0,0,.4,1.281A1.377,1.377,0,0,0,187.363,109.936Z"/>
                                      <path id="Path_2964" data-name="Path 2964" class="cls-2" d="M194.538,111.09a4.239,4.239,0,0,1-3.231-1.247,4.824,4.824,0,0,1-1.184-3.463,5.355,5.355,0,0,1,1.1-3.548,3.652,3.652,0,0,1,2.954-1.315,3.484,3.484,0,0,1,2.747,1.142,4.378,4.378,0,0,1,1.011,3.013v.885h-6.362a3.66,3.66,0,0,0,.822,2.469,2.843,2.843,0,0,0,2.2.843,7.431,7.431,0,0,0,2.949-.624v1.247a7.377,7.377,0,0,1-1.4.459,7.863,7.863,0,0,1-1.6.139Zm-.379-8.4a2.286,2.286,0,0,0-1.774.725,3.337,3.337,0,0,0-.779,2.006h4.828a3.072,3.072,0,0,0-.59-2.027,2.076,2.076,0,0,0-1.685-.706Z"/>
                                      <path id="Path_2965" data-name="Path 2965" class="cls-2" d="M206.951,109.683h-.076a3.287,3.287,0,0,1-2.9,1.407,3.427,3.427,0,0,1-2.819-1.239,5.452,5.452,0,0,1-1.006-3.522,5.542,5.542,0,0,1,1.011-3.548,3.4,3.4,0,0,1,2.814-1.264,3.361,3.361,0,0,1,2.883,1.365h.109l-.059-.665-.034-.649V97.809h1.4v13.113h-1.138Zm-2.8.236a2.551,2.551,0,0,0,2.078-.779,3.947,3.947,0,0,0,.644-2.516v-.3a4.638,4.638,0,0,0-.653-2.8,2.481,2.481,0,0,0-2.086-.839,2.14,2.14,0,0,0-1.883.957,4.76,4.76,0,0,0-.653,2.7,4.554,4.554,0,0,0,.649,2.671,2.194,2.194,0,0,0,1.906.906Z"/>
                                      <path id="Path_2966" data-name="Path 2966" class="cls-2" d="M220.712,101.534a3.435,3.435,0,0,1,2.827,1.243,6.653,6.653,0,0,1-.009,7.053,3.417,3.417,0,0,1-2.818,1.26,4,4,0,0,1-1.648-.333,3.094,3.094,0,0,1-1.251-1.023h-.1l-.295,1.188h-1V97.809h1.4V101q0,1.069-.068,1.921h.068a3.322,3.322,0,0,1,2.894-1.387Zm-.2,1.171a2.44,2.44,0,0,0-2.064.822,6.338,6.338,0,0,0,.017,5.553,2.464,2.464,0,0,0,2.081.839,2.158,2.158,0,0,0,1.922-.94,4.828,4.828,0,0,0,.632-2.7,4.645,4.645,0,0,0-.632-2.689,2.242,2.242,0,0,0-1.959-.885Z"/>
                                      <path id="Path_2967" data-name="Path 2967" class="cls-2" d="M225.758,101.686h1.5l2.023,5.267a20.188,20.188,0,0,1,.826,2.6h.067q.109-.431.459-1.471t2.288-6.4h1.5L230.452,112.2a5.253,5.253,0,0,1-1.378,2.212,2.932,2.932,0,0,1-1.934.653,5.659,5.659,0,0,1-1.264-.143V113.8a4.9,4.9,0,0,0,1.037.1,2.136,2.136,0,0,0,2.056-1.618l.514-1.314Z"/>
                                    </g>
                                </g>
                            </svg>
                                Swagger API
                            </a>
                            
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                            
                            <a href="https://claudiorigollet.cl/api/products" class="ml-1 underline">
                                API Products
                            </a>

                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>