
    <div class="flex justify-center h-screen w-screen items-center">
        <div class="flex w-fit gap-4 rounded-lg shadow h-fit">
            <div>
                <img class="w-96 rounded-l-xl" src="" alt="">
            </div>
            <div class="w-96  p-4 my-auto">
                <div class="bg-primary p-5 w-20 rounded-full mx-auto">
                    <img class="mx-auto" src="./img/validation.webp" alt="contractacion" width="22px" heigth="22px">
                </div>

                <form class="w-full flex flex-col gap-4" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="w-full">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="w-full">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <x-button class="">
                        {{ __('Log in') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
