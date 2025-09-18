<div class="container mx-auto px-4 py-6 md:py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-4 md:p-6 mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Información de la Empresa</h1>
            <p class="text-gray-600 text-sm md:text-base">Administra la misión, visión y valores de tu empresa</p>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <!-- Form -->
        <form wire:submit.prevent="save" class="bg-white rounded-lg shadow-md p-4 md:p-6">
            <div class="grid grid-cols-1 gap-6">
                <!-- About Us -->
                <div class="space-y-2">
                    <label for="about_us" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-building mr-2 text-purple-500"></i>
                        Nosotros
                    </label>
                    <textarea
                        wire:model.defer="about_us"
                        id="about_us"
                        rows="5"
                        class="w-full px-3 md:px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 ease-in-out resize-none text-sm md:text-base @error('about_us') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Describe quiénes somos como empresa..."
                    ></textarea>
                    @error('about_us')
                        <p class="text-red-500 text-sm mt-1">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Mission -->
                <div class="space-y-2">
                    <label for="mission" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-bullseye mr-2 text-blue-500"></i>
                        Misión
                    </label>
                    <textarea
                        wire:model.defer="mission"
                        id="mission"
                        rows="4"
                        class="w-full px-3 md:px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out resize-none text-sm md:text-base @error('mission') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Describe la misión de tu empresa..."
                    ></textarea>
                    @error('mission')
                        <p class="text-red-500 text-sm mt-1">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Vision -->
                <div class="space-y-2">
                    <label for="vision" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-eye mr-2 text-green-500"></i>
                        Visión
                    </label>
                    <textarea
                        wire:model.defer="vision"
                        id="vision"
                        rows="4"
                        class="w-full px-3 md:px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 ease-in-out resize-none text-sm md:text-base @error('vision') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Describe la visión de tu empresa..."
                    ></textarea>
                    @error('vision')
                        <p class="text-red-500 text-sm mt-1">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Values -->
                <div class="space-y-2">
                    <label for="values" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-heart mr-2 text-red-500"></i>
                        Valores
                    </label>
                    <textarea
                        wire:model.defer="values"
                        id="values"
                        rows="6"
                        class="w-full px-3 md:px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 ease-in-out resize-none text-sm md:text-base @error('values') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Describe los valores de tu empresa..."
                    ></textarea>
                    @error('values')
                        <p class="text-red-500 text-sm mt-1">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-gray-500 text-xs">Tip: Separa cada valor en una nueva línea para mejor presentación</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 md:mt-8 flex justify-end">
                <button
                    type="submit"
                    class="w-full md:w-auto bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 md:py-3 px-6 md:px-8 rounded-lg transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>
                        <i class="fas fa-save mr-2"></i>
                        Guardar Cambios
                    </span>
                    <span wire:loading>
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Guardando...
                    </span>
                </button>
            </div>
        </form>

        <!-- Preview Section -->
        <div class="bg-white rounded-lg shadow-md p-4 md:p-6 mt-6">
            <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">Vista Previa</h2>

            <!-- About Us Preview -->
            <div class="bg-purple-50 rounded-lg p-4 mb-4 md:mb-6">
                <h3 class="text-base md:text-lg font-semibold text-purple-800 mb-2">
                    <i class="fas fa-building mr-2"></i>
                    Nosotros
                </h3>
                <p class="text-gray-700 text-sm">{{ $about_us ?: 'No definido' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- Mission Preview -->
                <div class="bg-blue-50 rounded-lg p-4">
                    <h3 class="text-base md:text-lg font-semibold text-blue-800 mb-2">
                        <i class="fas fa-bullseye mr-2"></i>
                        Misión
                    </h3>
                    <p class="text-gray-700 text-sm">{{ $mission ?: 'No definida' }}</p>
                </div>

                <!-- Vision Preview -->
                <div class="bg-green-50 rounded-lg p-4">
                    <h3 class="text-base md:text-lg font-semibold text-green-800 mb-2">
                        <i class="fas fa-eye mr-2"></i>
                        Visión
                    </h3>
                    <p class="text-gray-700 text-sm">{{ $vision ?: 'No definida' }}</p>
                </div>

                <!-- Values Preview -->
                <div class="bg-red-50 rounded-lg p-4 md:col-span-2 lg:col-span-1">
                    <h3 class="text-base md:text-lg font-semibold text-red-800 mb-2">
                        <i class="fas fa-heart mr-2"></i>
                        Valores
                    </h3>
                    <div class="text-gray-700 text-sm">
                        @if($values)
                            @foreach(explode("\n", $values) as $value)
                                @if(trim($value))
                                    <p class="mb-1">• {{ trim($value) }}</p>
                                @endif
                            @endforeach
                        @else
                            <p>No definidos</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
