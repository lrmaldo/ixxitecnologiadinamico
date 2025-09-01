<div class="relative overflow-hidden" x-data="ticketFormHandler()">
    <div class="absolute inset-0 -z-10 opacity-40 pointer-events-none">
        <div class="absolute -top-40 -left-24 w-96 h-96 bg-gradient-to-br from-[#021869]/10 to-[#d9491e]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[520px] h-[520px] bg-gradient-to-tr from-[#d9491e]/10 to-transparent rounded-full blur-3xl"></div>
    </div>

    <!-- Loading Overlay -->
    <div x-show="loading" x-transition.opacity class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-8 flex flex-col items-center max-w-sm mx-4">
            <div class="w-16 h-16 border-4 border-[#d9491e]/30 border-t-[#d9491e] rounded-full animate-spin mb-4"></div>
            <h3 class="text-lg font-semibold text-zinc-800 mb-2">Enviando ticket...</h3>
            <p class="text-sm text-zinc-600 text-center">Por favor espera mientras procesamos tu solicitud</p>
        </div>
    </div>
    <div class="absolute inset-0 -z-10 opacity-40 pointer-events-none">
        <div class="absolute -top-40 -left-24 w-96 h-96 bg-gradient-to-br from-[#021869]/10 to-[#d9491e]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[520px] h-[520px] bg-gradient-to-tr from-[#d9491e]/10 to-transparent rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-12 space-y-10">
        <div class="text-center space-y-4">
            <h1 class="text-3xl font-extrabold tracking-tight text-zinc-800">Enviar Ticket de Soporte</h1>
            <p class="text-zinc-600 max-w-2xl mx-auto">Describe tu incidencia o consulta y nuestro equipo de soporte te responderá lo antes posible. Incluye pasos, mensajes de error y contexto.</p>
        </div>

        <!-- Mensajes de Error y Éxito -->
        <div x-show="showError" x-transition.opacity class="rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-red-700 text-sm flex items-start gap-3">
            <svg class="h-5 w-5 text-red-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <p class="font-medium" x-text="errorMessage"></p>
                <ul x-show="validationErrors && Object.keys(validationErrors).length > 0" class="mt-2 text-xs space-y-1">
                    <template x-for="(errors, field) in validationErrors" :key="field">
                        <template x-for="error in errors" :key="error">
                            <li x-text="error"></li>
                        </template>
                    </template>
                </ul>
            </div>
        </div>

        <div x-show="showSuccess" x-transition.opacity class="rounded-xl border border-emerald-300 bg-emerald-50 px-4 py-3 text-emerald-700 text-sm flex items-start gap-3">
            <svg class="h-5 w-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <p class="font-medium" x-text="successMessage"></p>
                <p class="text-xs mt-1">Redirigiendo a la página de confirmación...</p>
            </div>
        </div>

        <form @submit.prevent="submitTicket" class="space-y-12">
            <!-- Bloque Datos de contacto -->
            <div class="grid gap-6 md:grid-cols-3">
                <div class="md:col-span-1 space-y-2">
                    <h2 class="text-sm font-semibold text-zinc-700">Datos de contacto</h2>
                    <p class="text-xs text-zinc-500 leading-relaxed">Usaremos estos datos para notificarte cambios y resolución.</p>
                </div>
                <div class="md:col-span-2 grid gap-5 sm:grid-cols-2">
                    <div class="flex flex-col gap-1.5 sm:col-span-2">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Nombre completo</label>
                        <div class="relative">
                            <input type="text" x-model="formData.nombre" :class="getInputClass('nombre')" class="w-full rounded-lg border bg-white/90 backdrop-blur focus:ring-2 text-sm px-3 py-2 shadow-sm placeholder:text-zinc-400" placeholder="Nombre y apellidos" />
                            <svg class="h-4 w-4 text-zinc-400 absolute right-3 top-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div x-show="fieldErrors.nombre" class="text-[11px] text-red-600" x-text="fieldErrors.nombre"></div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Email</label>
                        <div class="relative">
                            <input type="email" x-model="formData.email" :class="getInputClass('email')" class="w-full rounded-lg border bg-white/90 focus:ring-2 text-sm px-3 py-2 shadow-sm placeholder:text-zinc-400" placeholder="correo@ejemplo.com" />
                            <svg class="h-4 w-4 text-zinc-400 absolute right-3 top-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <div x-show="fieldErrors.email" class="text-[11px] text-red-600" x-text="fieldErrors.email"></div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Teléfono <span class="text-zinc-400 lowercase">(opcional)</span></label>
                        <div class="relative">
                            <input type="text" x-model="formData.telefono" :class="getInputClass('telefono')" class="w-full rounded-lg border bg-white/90 focus:ring-2 text-sm px-3 py-2 shadow-sm placeholder:text-zinc-400" placeholder="Ej: +34 600 123 456" />
                            <svg class="h-4 w-4 text-zinc-400 absolute right-3 top-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                        </div>
                        <div x-show="fieldErrors.telefono" class="text-[11px] text-red-600" x-text="fieldErrors.telefono"></div>
                    </div>
                </div>
            </div>

            <!-- Bloque Detalle -->
            <div class="grid gap-6 md:grid-cols-3">
                <div class="md:col-span-1 space-y-2">
                    <h2 class="text-sm font-semibold text-zinc-700">Detalle del ticket</h2>
                    <p class="text-xs text-zinc-500 leading-relaxed">Título claro + descripción con pasos, impacto y errores.</p>
                </div>
                <div class="md:col-span-2 space-y-6">
                    <div class="flex flex-col gap-1.5">
                        <div class="flex justify-between items-end">
                            <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Título</label>
                            <span class="text-[11px] text-zinc-400" x-text="tituloLength + '/140'" aria-live="polite"></span>
                        </div>
                        <input type="text" x-model="formData.titulo" x-on:input="tituloLength = $event.target.value.length" :class="getInputClass('titulo')" maxlength="140" class="w-full rounded-lg border bg-white/90 focus:ring-2 text-sm px-3 py-2 shadow-sm placeholder:text-zinc-400" placeholder="Resumen breve (máx 140 caracteres)" />
                        <div class="h-1 rounded bg-zinc-200 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-indigo-500 to-[#d9491e] transition-all" :style="`width:${(tituloLength/140)*100}%`"></div>
                        </div>
                        <div x-show="fieldErrors.titulo" class="text-[11px] text-red-600" x-text="fieldErrors.titulo"></div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <div class="flex justify-between items-end">
                            <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Descripción</label>
                            <span class="text-[11px] text-zinc-400" x-text="descLength + ' caracteres'" aria-live="polite"></span>
                        </div>
                        <textarea rows="7" x-model="formData.descripcion" x-on:input="descLength = $event.target.value.length" :class="getTextareaClass('descripcion')" class="w-full rounded-lg border bg-white/90 focus:ring-2 text-sm leading-relaxed px-3 py-2 shadow-sm placeholder:text-zinc-400" placeholder="Explica problema, contexto, pasos para reproducir y resultado esperado."></textarea>
                        <div class="flex items-center gap-2">
                            <div class="h-1 flex-1 rounded bg-zinc-200 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-indigo-500 to-[#d9491e] transition-all" :style="`width:${Math.min((descLength/descMin)*100,100)}%`"></div>
                            </div>
                            <span class="text-[10px] text-zinc-400" x-text="(descLength < descMin) ? ('mín ' + descMin) : 'ok'" :class="descLength < descMin ? 'text-red-500' : 'text-emerald-600'"></span>
                        </div>
                        <div x-show="fieldErrors.descripcion" class="text-[11px] text-red-600" x-text="fieldErrors.descripcion"></div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-medium uppercase tracking-wide text-zinc-600">Prioridad</label>
                        <div class="flex gap-2">
                            <button type="button" @click="formData.prioridad='baja'; prioridad='baja'"
                                :class="[
                                    'flex-1 text-xs font-medium px-3 py-2 rounded-lg border transition-all duration-200 ease-in-out flex items-center justify-center gap-1.5',
                                    prioridad==='baja'
                                        ? 'border-[#d9491e] bg-gradient-to-tr from-[#d9491e]/90 to-[#e25a2f] text-white shadow-md transform scale-[1.02]'
                                        : 'border-zinc-300 bg-white text-zinc-700 hover:border-[#d9491e]/70 hover:text-[#d9491e] hover:shadow-sm'
                                ]">
                                <span class="w-2 h-2 rounded-full" :class="prioridad==='baja' ? 'bg-white' : 'bg-emerald-400'"></span>
                                Baja
                            </button>
                            <button type="button" @click="formData.prioridad='media'; prioridad='media'"
                                :class="[
                                    'flex-1 text-xs font-medium px-3 py-2 rounded-lg border transition-all duration-200 ease-in-out flex items-center justify-center gap-1.5',
                                    prioridad==='media'
                                        ? 'border-[#d9491e] bg-gradient-to-tr from-[#d9491e]/90 to-[#e25a2f] text-white shadow-md transform scale-[1.02]'
                                        : 'border-zinc-300 bg-white text-zinc-700 hover:border-[#d9491e]/70 hover:text-[#d9491e] hover:shadow-sm'
                                ]">
                                <span class="w-2 h-2 rounded-full" :class="prioridad==='media' ? 'bg-white' : 'bg-amber-400'"></span>
                                Media
                            </button>
                            <button type="button" @click="formData.prioridad='alta'; prioridad='alta'"
                                :class="[
                                    'flex-1 text-xs font-medium px-3 py-2 rounded-lg border transition-all duration-200 ease-in-out flex items-center justify-center gap-1.5',
                                    prioridad==='alta'
                                        ? 'border-[#d9491e] bg-gradient-to-tr from-[#d9491e]/90 to-[#e25a2f] text-white shadow-md transform scale-[1.02]'
                                        : 'border-zinc-300 bg-white text-zinc-700 hover:border-[#d9491e]/70 hover:text-[#d9491e] hover:shadow-sm'
                                ]">
                                <span class="w-2 h-2 rounded-full" :class="prioridad==='alta' ? 'bg-white' : 'bg-red-400'"></span>
                                Alta
                            </button>
                        </div>
                        <div x-show="fieldErrors.prioridad" class="text-[11px] text-red-600" x-text="fieldErrors.prioridad"></div>
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-4">
                <button type="submit" :disabled="loading || (descLength < descMin)" :class="[
                    'inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 text-sm font-semibold text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-[#d9491e]/40 transition-all duration-200',
                    loading || (descLength < descMin)
                        ? 'bg-zinc-400 cursor-not-allowed opacity-50'
                        : 'bg-gradient-to-tr from-[#d9491e] to-[#e25a2f] hover:shadow-lg hover:scale-[1.02]'
                ]">
                    <template x-if="!loading">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                        </svg>
                    </template>
                    <template x-if="loading">
                        <div class="h-4 w-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                    </template>
                    <span x-text="loading ? 'Enviando...' : 'Enviar Ticket'"></span>
                </button>
                <p class="text-[11px] text-zinc-500">Al enviar aceptas nuestra política de privacidad.</p>
            </div>

            <!-- Hidden / honeypot -->
            <input type="hidden" x-model="formData.extra_field" />
            <input type="hidden" x-model="formData.session_token" value="{{session()->token()}}" />
        </form>

        <!-- Incluir Axios CDN -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script>
            function ticketFormHandler() {
                return {
                    // Estados de la aplicación
                    loading: false,
                    showError: false,
                    showSuccess: false,
                    errorMessage: '',
                    successMessage: '',
                    validationErrors: {},
                    fieldErrors: {},

                    // Datos del formulario
                    formData: {
                        nombre: '',
                        email: '',
                        telefono: '',
                        titulo: '',
                        descripcion: '',
                        prioridad: @js($prioridad ?? 'media'),
                        extra_field: '', // honeypot
                        session_token: ''
                    },

                    // Estados visuales
                    tituloLength: 0,
                    descLength: 0,
                    descMin: 10,
                    prioridad: @js($prioridad ?? 'media'),

                    init() {
                        // Configurar axios con CSRF token
                        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                        if (token) {
                            axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
                        }

                        // Inicializar contadores
                        this.$watch('formData.titulo', (value) => {
                            this.tituloLength = value ? value.length : 0;
                        });

                        this.$watch('formData.descripcion', (value) => {
                            this.descLength = value ? value.length : 0;
                        });

                        this.$watch('formData.prioridad', (value) => {
                            this.prioridad = value;
                        });
                    },

                    // Método para obtener clases CSS de inputs según estado de error
                    getInputClass(field) {
                        const baseClass = 'border-zinc-300 focus:border-[#d9491e] focus:ring-[#d9491e]/30';
                        const errorClass = 'border-red-300 focus:border-red-500 focus:ring-red-500/30';
                        return this.fieldErrors[field] ? errorClass : baseClass;
                    },

                    getTextareaClass(field) {
                        return this.getInputClass(field);
                    },

                    // Limpiar mensajes y errores
                    clearMessages() {
                        this.showError = false;
                        this.showSuccess = false;
                        this.errorMessage = '';
                        this.successMessage = '';
                        this.validationErrors = {};
                        this.fieldErrors = {};
                    },

                    // Procesar errores de validación
                    processValidationErrors(errors) {
                        this.fieldErrors = {};
                        for (const [field, messages] of Object.entries(errors)) {
                            if (Array.isArray(messages) && messages.length > 0) {
                                this.fieldErrors[field] = messages[0]; // Mostrar solo el primer error
                            }
                        }
                    },

                    // Método principal para enviar el formulario
                    async submitTicket() {
                        if (this.loading) return;

                        this.clearMessages();
                        this.loading = true;

                        try {
                            // Scroll suave hacia arriba para mostrar mensajes
                            window.scrollTo({ top: 0, behavior: 'smooth' });

                            const response = await axios.post('/api/tickets', this.formData, {
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json'
                                }
                            });

                            if (response.data.success) {
                                this.successMessage = response.data.message || '¡Ticket enviado exitosamente!';
                                this.showSuccess = true;

                                // Limpiar formulario
                                this.resetForm();

                                // Redirigir después de un breve delay
                                setTimeout(() => {
                                    if (response.data.redirect_url) {
                                        window.location.href = response.data.redirect_url;
                                    }
                                }, 2000);
                            } else {
                                throw new Error(response.data.message || 'Error al enviar el ticket');
                            }

                        } catch (error) {
                            console.error('Error enviando ticket:', error);

                            if (error.response?.status === 422) {
                                // Errores de validación
                                const errors = error.response.data.errors || {};
                                this.validationErrors = errors;
                                this.processValidationErrors(errors);
                                this.errorMessage = error.response.data.message || 'Error de validación. Por favor revisa los campos.';
                            } else if (error.response?.data?.error) {
                                this.errorMessage = error.response.data.error;
                            } else if (error.message) {
                                this.errorMessage = error.message;
                            } else {
                                this.errorMessage = 'Error de conexión. Por favor intenta nuevamente.';
                            }

                            this.showError = true;
                        } finally {
                            this.loading = false;
                        }
                    },

                    // Resetear formulario
                    resetForm() {
                        this.formData = {
                            nombre: '',
                            email: '',
                            telefono: '',
                            titulo: '',
                            descripcion: '',
                            prioridad: 'media',
                            extra_field: '',
                            session_token: ''
                        };
                        this.tituloLength = 0;
                        this.descLength = 0;
                        this.prioridad = 'media';
                    }
                }
            }
        </script>
    </div>
</div>
