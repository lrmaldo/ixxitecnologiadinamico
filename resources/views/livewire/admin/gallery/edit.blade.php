<div>
<div class="max-w-6xl mx-auto p-4 sm:p-6 space-y-8">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">{{ $item ? 'Editar imagen' : 'Nueva imagen' }}</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Sube y gestiona los activos visuales de la galería.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.gallery') }}" class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60 transition">Cancelar</a>
            <button form="galleryForm"
                    class="inline-flex items-center gap-2 rounded-lg bg-[#204369] hover:bg-[#17314a] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition disabled:opacity-60 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled"
                    wire:target="file,save"
                    :disabled="uploading"
            >
                Guardar
            </button>
        </div>
    </div>

    <form id="galleryForm" wire:submit.prevent="save" class="grid gap-6 lg:grid-cols-3">
        <!-- Main column -->
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/50 p-6 shadow-sm space-y-6">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Título</label>
                    <input type="text" wire:model.live="title" placeholder="Título descriptivo" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                    @error('title')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-1.5">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Descripción</label>
                        <span class="text-[11px] text-zinc-400">{{ strlen($description ?? '') }} caracteres</span>
                    </div>
                    <textarea wire:model.live.debounce.400ms="description" rows="6" placeholder="Texto descriptivo de la imagen..." class="rounded-xl border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-3 text-sm leading-relaxed focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30"></textarea>
                </div>
            </div>

            <!-- Preview Panel -->
            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-900 dark:to-zinc-900/70 p-6 shadow-sm space-y-5">
                <h3 class="text-sm font-semibold text-zinc-700 dark:text-zinc-200 mb-4 flex items-center gap-2">
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-100 text-indigo-600 dark:bg-indigo-900/40 dark:text-indigo-300 text-xs">PR</span>
                    Vista previa
                </h3>
                <div class="aspect-video w-full rounded-xl border border-dashed border-zinc-300 dark:border-zinc-700 flex items-center justify-center overflow-hidden bg-zinc-100/60 dark:bg-zinc-800/40">
                    @if($file)
                        <img src="{{ $file->temporaryUrl() }}" class="h-full w-full object-cover" />
                    @elseif($image_path)
                        <img src="{{ asset('storage/'.$image_path) }}" class="h-full w-full object-cover" />
                    @else
                        <div class="text-xs text-zinc-400 flex flex-col items-center gap-2">
                            <flux:icon name="photo" class="h-6 w-6" />
                            Sin imagen seleccionada
                        </div>
                    @endif
                </div>
                <div class="mt-4 space-y-2 text-xs text-zinc-500 dark:text-zinc-400">
                    <p><span class="font-medium">Ruta actual:</span> {{ $image_path ?: '—' }}</p>
                    @if($file)
                        <p class="text-emerald-600 dark:text-emerald-400">Archivo temporal listo para subir.</p>
                    @endif
                </div>
                @if($file && $item?->image_path)
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                        <div class="space-y-2">
                            <p class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Antes</p>
                            <img src="{{ asset('storage/'.$item->image_path) }}" class="aspect-video w-full object-cover rounded-lg border border-zinc-200 dark:border-zinc-700" />
                        </div>
                        <div class="space-y-2">
                            <p class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Después</p>
                            <img src="{{ $file->temporaryUrl() }}" class="aspect-video w-full object-cover rounded-lg border border-emerald-300 dark:border-emerald-600" />
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Upload -->
            <div
                x-data="dragUpload({ livewire:@this })"
                x-on:dragover.prevent="hover=true"
                x-on:dragleave.prevent="hover=false"
                x-on:drop.prevent="handleDrop($event)"
                class="rounded-2xl min-h-[220px] border-2 border-dashed flex flex-col items-center justify-center text-center p-6 transition relative overflow-hidden"
                x-bind:class="hover ? 'border-indigo-400 bg-indigo-50/60 dark:border-indigo-500 dark:bg-indigo-900/20 scale-[1.015]' : 'border-zinc-300 dark:border-zinc-600 bg-white/70 dark:bg-zinc-900/50'"
            >
                <input type="file" wire:model="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" @change="manualSelect($event)" />
                <div class="flex flex-col items-center" x-show="!uploading" x-transition.opacity>
                    <flux:icon name="arrow-up-tray" class="h-8 w-8 text-indigo-500 mb-3 transition-transform" x-bind:class="hover ? 'animate-bounce' : ''" />
                    <p class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Arrastra una imagen</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">o haz clic para seleccionar</p>
                    <p class="mt-3 text-[11px] text-zinc-400">(Máx 4MB, JPG/PNG/WebP)</p>
                    @error('file')<p class="mt-2 text-xs text-red-600">{{ $message }}</p>@enderror
                    @if($file || $image_path)
                        <button type="button" x-data="{}" @click="$dispatch('open-cropper')" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-medium px-3 py-2 shadow-sm">
                            <flux:icon name="scissors" class="h-4 w-4" /> Recortar / Optimizar
                        </button>
                    @endif
                </div>
                <!-- Overlay Uploading -->
                <div x-show="uploading" x-transition.opacity class="absolute inset-0 flex flex-col items-center justify-center gap-4 bg-zinc-900/70 backdrop-blur-sm text-white" x-cloak>
                    <div class="flex flex-col items-center gap-3">
                        <div class="relative h-12 w-12">
                            <div class="absolute inset-0 rounded-full border-4 border-indigo-500/30"></div>
                            <div class="absolute inset-0 rounded-full border-4 border-indigo-400 border-t-transparent animate-spin"></div>
                        </div>
                        <p class="text-sm font-medium">Subiendo imagen...</p>
                        <div class="w-48 h-2 rounded-full bg-white/20 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-indigo-400 to-indigo-600 transition-all" :style="`width:${progress}%`"></div>
                        </div>
                        <span class="text-xs tracking-wide" x-text="progress + '%'" ></span>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-zinc-200/70 dark:border-zinc-700/60 bg-white/80 dark:bg-zinc-900/60 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-zinc-900/50 p-6 shadow-sm space-y-5">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Ruta manual</label>
                    <input type="text" wire:model.live="image_path" placeholder="storage/gallery/..." class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                    @error('image_path')<p class="text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Activo</span>
                        <span class="text-[11px] text-zinc-400">Visibilidad pública</span>
                    </div>
                    <button type="button" wire:click="$set('is_active', !is_active)" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors {{ $is_active ? 'bg-emerald-500' : 'bg-zinc-300 dark:bg-zinc-700' }} focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/50">
                        <span class="inline-block h-5 w-5 transform rounded-full bg-white dark:bg-zinc-200 shadow ring-0 transition {{ $is_active ? 'translate-x-5' : 'translate-x-1' }}"></span>
                    </button>
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-medium uppercase tracking-wide text-zinc-600 dark:text-zinc-400">Posición preferida</label>
                    <input type="number" wire:model.live="position" class="rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-900 px-3 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 w-32" />
                </div>
                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                        <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Creado</span>
                        <span class="text-zinc-700 dark:text-zinc-300">{{ $item?->created_at?->format('d/m/Y') ?? '—' }}</span>
                    </div>
                    <div class="flex flex-col gap-1 rounded-xl border border-zinc-200/70 dark:border-zinc-700/60 p-3">
                        <span class="text-[11px] uppercase font-medium text-zinc-500 dark:text-zinc-400">Actualizado</span>
                        <span class="text-zinc-700 dark:text-zinc-300">{{ $item?->updated_at?->format('d/m/Y') ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- Scripts internos (mantener dentro del root para evitar múltiples raíces) -->
<script>
    function dragUpload({livewire}) {
        return {
            hover:false,
            uploading:false,
            progress:0,
            timeoutId:null,
            init(){
                // Asegura que el contenido inicial se muestre (forzar repaint en algunos navegadores)
                requestAnimationFrame(()=>{});
                const clearUpload = ()=>{ this.uploading=false; this.progress=0; if(this.timeoutId) clearTimeout(this.timeoutId); };
                window.addEventListener('livewire-upload-start', ()=>{ this.uploading=true; this.progress=0; if(this.timeoutId) clearTimeout(this.timeoutId); });
                window.addEventListener('livewire-upload-finish', ()=>{ this.progress=100; this.timeoutId = setTimeout(clearUpload, 800); });
                window.addEventListener('livewire-upload-error', ()=>{ clearUpload(); });
                window.addEventListener('livewire-upload-progress', e=>{
                    const val = e.detail && 'progress' in e.detail ? e.detail.progress : e.detail;
                    if (val && typeof val === 'object' && 'loaded' in val && 'total' in val && val.total) {
                        const pct = Math.round((val.loaded / val.total) * 100);
                        this.progress = Math.min(100, pct);
                        if (val.loaded === val.total) {
                            // Marca 100% y limpia pronto si por alguna razón no llega 'finish'
                            if(this.timeoutId) clearTimeout(this.timeoutId);
                            this.timeoutId = setTimeout(()=>{ if(this.uploading){ clearUpload(); } }, 800);
                        }
                    } else if (typeof val === 'number') {
                        this.progress = Math.min(100, Math.round(val));
                    } else {
                        this.progress = this.progress || 0;
                    }
                    // Fallback si no llega finish
                    if(this.progress>=99){
                        // fuerza cierre si en 3s no llegó el evento finish
                        if(this.timeoutId) clearTimeout(this.timeoutId);
                        this.timeoutId = setTimeout(()=>{ if(this.uploading){ clearUpload(); } }, 3000);
                    }
                });
            },
            manualSelect(e){
                // wire:model se encarga, pero si quisieras usar livewire.upload directamente, seguir el mismo patrón de progreso
                // (dejamos este hook por si se activa en el futuro)
            },
            handleDrop(e){
                this.hover=false;
                if(e.dataTransfer.files && e.dataTransfer.files[0]){
                    const file = e.dataTransfer.files[0];
                    this.uploading=true; this.progress=0;
                    livewire.upload(
                        'file',
                        file,
                        ()=>{ /* éxito: el evento finish actualizará la UI */ },
                        ()=>{ this.uploading=false; },
                        (event)=>{
                            // En algunos contextos, este callback entrega un ProgressEvent del XHR
                            // Convertimos a porcentaje numérico (0-100)
                            if (event && typeof event === 'object' && 'loaded' in event && 'total' in event && event.total) {
                                const pct = Math.round((event.loaded / event.total) * 100);
                                this.progress = Math.min(100, pct);
                                if (event.loaded === event.total) {
                                    if(this.timeoutId) clearTimeout(this.timeoutId);
                                    this.timeoutId = setTimeout(()=>{ if(this.uploading){ this.uploading=false; this.progress=0; } }, 800);
                                }
                            } else if (typeof event === 'number') {
                                this.progress = Math.min(100, Math.round(event));
                            } else {
                                // Fallback
                                this.progress = this.progress || 0;
                            }
                        }
                    );
                }
            }
        }
    }
</script>
<!-- Estilos Cropper -->
<link rel="stylesheet" href="https://unpkg.com/cropperjs@1.6.2/dist/cropper.css" />
<script src="https://unpkg.com/cropperjs@1.6.2/dist/cropper.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('cropperModal', ({livewire}) => ({
            show:false,
            src:null,
            cropper:null,
            aspect:'free',
            quality:0.9,
            loading:false,
            open(){
                // detectar fuente
                this.src = @this.get('file') ? @this.get('file').temporaryUrl() : (@this.get('image_path') ? ('/storage/'+@this.get('image_path')) : null);
                if(!this.src) return;
                this.show=true;
                this.$nextTick(()=>{ this.initCropper(); });
            },
            initCropper(){
                const img = this.$refs.cropImage;
                if(this.cropper) { this.cropper.destroy(); }
                this.cropper = new Cropper(img, {
                    aspectRatio: this.aspect==='free' ? NaN : (this.aspect==='16:9'?16/9:(this.aspect==='4:3'?4/3:(this.aspect==='1:1'?1:NaN))),
                    viewMode:1,
                    background:false,
                    autoCropArea:1,
                    preview: '.cropper-live-preview',
                });
            },
            setAspect(val){ this.aspect=val; if(this.cropper){ this.initCropper(); } },
            zoom(v){ if(this.cropper){ this.cropper.zoom(v); } },
            rotate(d){ if(this.cropper){ this.cropper.rotate(d); } },
            flipH(){ if(this.cropper){ const s = this.cropper.getData(); this.cropper.scaleX((this.cropper.imageData.scaleX||1)*-1); } },
            flipV(){ if(this.cropper){ this.cropper.scaleY((this.cropper.imageData.scaleY||1)*-1); } },
            apply(){
                if(!this.cropper) return;
                this.loading=true;
                const canvas = this.cropper.getCroppedCanvas({
                    maxWidth: 2560,
                    maxHeight: 2560,
                    fillColor:'#ffffff'
                });
                canvas.toBlob((blob)=>{
                    if(!blob){ this.loading=false; return; }
                    const file = new File([blob], 'cropped.jpg', {type: blob.type});
                    livewire.upload('file', file, ()=>{ this.loading=false; this.show=false; }, ()=>{ this.loading=false; }, ()=>{} );
                }, 'image/jpeg', this.quality);
            }
        }));
    });

    document.addEventListener('open-cropper', ()=>{
        const cmp = Alpine.discoverComponents().find(c=> c.$data && c.$data.open && c.$data.open.name!==undefined);
        // Fallback: query by id if defined
    });
</script>

<!-- Modal Recorte -->
<div x-data="cropperModal({livewire:@this})" x-on:open-cropper.window="open()">
    <template x-if="show">
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" @click="show=false"></div>
            <div class="relative w-full max-w-5xl mx-auto bg-white dark:bg-zinc-900 rounded-2xl shadow-xl border border-zinc-200 dark:border-zinc-700 p-6 space-y-5">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-zinc-800 dark:text-zinc-100">Recortar & Optimizar</h2>
                        <p class="text-xs mt-1 text-zinc-500 dark:text-zinc-400">Ajusta la porción visible, relación de aspecto, rotaciones y calidad final.</p>
                    </div>
                    <div class="flex flex-wrap gap-2 text-xs items-center">
                        <select x-model="aspect" @change="setAspect(aspect)" class="rounded border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-2 py-1">
                            <option value="free">Libre</option>
                            <option value="16:9">16:9</option>
                            <option value="4:3">4:3</option>
                            <option value="1:1">1:1</option>
                        </select>
                        <button type="button" @click="zoom(0.1)" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">+</button>
                        <button type="button" @click="zoom(-0.1)" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">-</button>
                        <button type="button" @click="rotate(90)" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">↻</button>
                        <button type="button" @click="rotate(-90)" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">↺</button>
                        <button type="button" @click="flipH()" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">Flip H</button>
                        <button type="button" @click="flipV()" class="px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800">Flip V</button>
                        <div class="flex items-center gap-1">
                            <label class="text-[11px] text-zinc-500">Calidad</label>
                            <input type="range" min="0.3" max="1" step="0.05" x-model.number="quality" class="accent-indigo-600" />
                            <span class="text-[11px] text-zinc-500" x-text="Math.round(quality*100)+'%'" ></span>
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-5 gap-6">
                    <div class="relative overflow-hidden rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 lg:col-span-4">
                        <template x-if="src">
                            <img :src="src" x-ref="cropImage" class="max-h-[60vh] block w-auto mx-auto" />
                        </template>
                    </div>
                    <div class="space-y-4 lg:col-span-1">
                        <p class="text-[11px] font-medium uppercase text-zinc-500 dark:text-zinc-400">Vista previa</p>
                        <div class="cropper-live-preview w-full aspect-square rounded-lg overflow-hidden border border-zinc-200 dark:border-zinc-700 bg-zinc-100 dark:bg-zinc-800"></div>
                        <p class="text-[11px] text-zinc-400">Se actualiza en tiempo real.</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-2">
                    <button type="button" @click="show=false" class="inline-flex justify-center rounded-lg border border-zinc-300 dark:border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 hover:bg-zinc-100 dark:hover:bg-zinc-800/60">Cancelar</button>
                    <button type="button" @click="apply" :disabled="loading" class="inline-flex justify-center rounded-lg bg-indigo-600 hover:bg-indigo-500 px-5 py-2 text-sm font-medium text-white shadow-sm disabled:opacity-50">
                        <span x-show="!loading" class="flex items-center gap-2"><flux:icon name="check" class="h-4 w-4" /> Aplicar</span>
                        <span x-show="loading" class="flex items-center gap-2"><flux:icon name="arrow-path" class="h-4 w-4 animate-spin" /> Procesando</span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
</div>
