<div class="flex flex-col gap-6">
    <div class="flex flex-col items-center justify-center mb-6">
        <x-app-logo size="md" class="[&_img]:max-h-16 mb-4" />
        <span class="font-bold text-[#021869] dark:text-white text-2xl">IXXI TECNOLOGÍA</span>
    </div>

    <x-auth-header :title="__('Inicia sesión en tu cuenta')" :description="__('Ingresa tus credenciales para acceder al sistema')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-lg p-6 border border-[#cfe0ff] dark:border-[#092cce]">
        <form method="POST" wire:submit="login" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Correo electrónico')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="correo@ejemplo.com"
                class="focus:border-[#4370ff] focus:ring-[#4370ff]"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    wire:model="password"
                    :label="__('Contraseña')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Contraseña')"
                    viewable
                    class="focus:border-[#4370ff] focus:ring-[#4370ff]"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute end-0 top-0 text-sm text-[#4370ff] hover:text-[#021869] transition-colors duration-200" :href="route('password.request')" wire:navigate>
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" :label="__('Recordarme')" class="text-[#4370ff]" />

            <div class="flex items-center justify-center mt-4">
                <flux:button
                    variant="primary"
                    type="submit"
                    class="w-full py-3 bg-gradient-to-r from-[#021869] to-[#1d46ff] hover:from-[#0925a9] hover:to-[#4370ff] text-white font-medium rounded-md transition-all duration-300 transform hover:scale-[1.02] shadow-md"
                >
                    {{ __('Iniciar sesión') }}
                </flux:button>
            </div>
        </form>
    </div>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm mt-4 text-zinc-600 dark:text-zinc-400">
            <span>{{ __('¿No tienes una cuenta?') }}</span>
            <flux:link :href="route('register')" wire:navigate class="text-[#4370ff] hover:text-[#021869] font-medium">
                {{ __('Regístrate') }}
            </flux:link>
        </div>
    @endif
</div>
