<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Semilla para crear un registro por defecto de información de contacto
     */
    public function run(): void
    {
        // Verificar si ya existe información de contacto
        if (ContactInformation::count() === 0) {
            ContactInformation::create([
                'phone' => '+52 999 123 4567',
                'email' => 'contacto@ixxitecnologia.com',
                'address' => 'Mérida, Yucatán, México',
                'business_hours_weekdays' => 'Lunes a Viernes: 9AM - 6PM',
                'business_hours_weekends' => 'Sábados: 9AM - 2PM',
                'whatsapp' => '529991234567',
                'social_media' => [
                    'facebook' => 'https://facebook.com/ixxitecnologia',
                    'instagram' => 'https://instagram.com/ixxitecnologia',
                    'twitter' => null,
                    'linkedin' => null,
                ],
            ]);
        }
    }
}
