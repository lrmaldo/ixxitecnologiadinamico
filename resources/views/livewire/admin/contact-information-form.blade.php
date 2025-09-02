<div>
    <div class="p-6 bg-white dark:bg-zinc-800 rounded-lg">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Información de Contacto</h3>

                <!-- Teléfono -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                    <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Correo electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                    <input type="email" id="email" wire:model="email" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Dirección -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</label>
                    <input type="text" id="address" wire:model="address" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Horarios -->
                <div>
                    <label for="business_hours_weekdays" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horario (lunes a viernes)</label>
                    <input type="text" id="business_hours_weekdays" wire:model="business_hours_weekdays" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Lunes a Viernes: 9AM - 6PM">
                    @error('business_hours_weekdays') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="business_hours_weekends" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horario (fines de semana)</label>
                    <input type="text" id="business_hours_weekends" wire:model="business_hours_weekends" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Sábados: 9AM - 2PM">
                    @error('business_hours_weekends') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- WhatsApp -->
                <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">WhatsApp (formato internacional sin espacios)</label>
                    <input type="text" id="whatsapp" wire:model="whatsapp" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="529991234567">
                    @error('whatsapp') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 pt-4">Redes Sociales</h3>

                <!-- Facebook -->
                <div>
                    <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook (URL)</label>
                    <input type="url" id="facebook" wire:model="facebook" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="https://facebook.com/tuempresa">
                    @error('facebook') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Instagram -->
                <div>
                    <label for="instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram (URL)</label>
                    <input type="url" id="instagram" wire:model="instagram" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="https://instagram.com/tuempresa">
                    @error('instagram') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Twitter -->
                <div>
                    <label for="twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter/X (URL)</label>
                    <input type="url" id="twitter" wire:model="twitter" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="https://twitter.com/tuempresa">
                    @error('twitter') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- LinkedIn -->
                <div>
                    <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">LinkedIn (URL)</label>
                    <input type="url" id="linkedin" wire:model="linkedin" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm py-2 px-3 bg-white dark:bg-zinc-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="https://linkedin.com/company/tuempresa">
                    @error('linkedin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
