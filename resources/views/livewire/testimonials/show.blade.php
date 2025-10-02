<div>
    <div class="bg-[#204369] text-white py-24">
        <div class="container mx-auto px-6">
            <a href="{{ route('testimonios.index') }}" class="inline-flex items-center text-blue-100 hover:text-white mb-8">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver a testimonios
            </a>

            <div class="max-w-4xl mx-auto">
                <div class="bg-zinc-50 rounded-2xl p-8 md:p-12 shadow-sm border border-zinc-200">
                    <div class="flex items-start mb-8">
                        <div class="h-16 w-16 rounded-full bg-[#C8DBEF] flex items-center justify-center text-[#204369] font-bold text-2xl">
                            {{ substr($testimonial->author_name, 0, 1) }}
                        </div>
                        <div class="ml-6">
                            <h1 class="text-2xl md:text-3xl font-bold text-[#204369]">{{ $testimonial->author_name }}</h1>
                            <p class="text-lg text-zinc-700">{{ $testimonial->company }}</p>
                            <div class="flex text-yellow-400 mt-2">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="h-6 w-6 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-zinc-700 leading-relaxed">
                            {{ $testimonial->content }}
                        </p>
                    </div>

                    <div class="mt-8 pt-8 border-t border-zinc-200">
                        <p class="text-sm text-zinc-500">
                            Publicado el {{ $testimonial->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
