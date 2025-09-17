<?php

namespace App\Console\Commands;

use App\Mail\ContactFormMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestContactEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:contact-email {--email=contacto@ixxitecnologia.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prueba el envío de correos del formulario de contacto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Iniciando prueba de envío de correo...');

        $testEmail = $this->option('email');

        // Mostrar usuarios que recibirán copias
        $ccUsers = User::contactEmailRecipients();
        if ($ccUsers->count() > 0) {
            $this->info('📋 Usuarios que recibirán copias:');
            foreach ($ccUsers as $user) {
                $this->line("   • {$user->name} ({$user->email})");
            }
        } else {
            $this->warn('⚠️  No hay usuarios configurados para recibir copias de correos de contacto.');
        }

        try {
            // Crear el correo de prueba
            $mail = new ContactFormMail(
                customerName: 'Usuario de Prueba',
                customerEmail: 'test@example.com',
                customerPhone: '+1 234 567 8900',
                customerMessage: 'Este es un mensaje de prueba para verificar que el sistema de correos funciona correctamente. Si recibes este mensaje, ¡todo está funcionando bien!',
                source: 'test'
            );

            // Enviar el correo
            Mail::send($mail);

            $this->info("✅ Correo de prueba enviado exitosamente a: {$testEmail}");
            if ($ccUsers->count() > 0) {
                $this->info("📧 Copias enviadas a {$ccUsers->count()} usuario(s) adicional(es)");
            }

        } catch (\Exception $e) {
            $this->error("❌ Error al enviar el correo: " . $e->getMessage());
            $this->warn('💡 Verifica la configuración de correo en tu archivo .env');
            $this->line('');
            $this->line('Configuración actual:');
            $this->line('MAIL_MAILER: ' . config('mail.default'));
            $this->line('MAIL_HOST: ' . config('mail.mailers.smtp.host'));
            $this->line('MAIL_PORT: ' . config('mail.mailers.smtp.port'));
            $this->line('MAIL_FROM_ADDRESS: ' . config('mail.from.address'));

            return 1;
        }

        return 0;
    }
}
