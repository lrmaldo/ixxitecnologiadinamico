<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'address',
        'business_hours_weekdays',
        'business_hours_weekends',
        'whatsapp',
        'social_media',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    /**
     * Obtener la configuración de redes sociales
     *
     * @return array
     */
    public function getSocialMediaLinks()
    {
        return $this->social_media ?? [
            'facebook' => null,
            'instagram' => null,
            'twitter' => null,
            'linkedin' => null,
        ];
    }

    /**
     * Obtener la primera instancia o crear una nueva si no existe
     *
     * @return ContactInformation
     */
    public static function getDefault()
    {
        $info = self::first();
        
        if (!$info) {
            $info = self::create([
                'phone' => config('branding.phone', '+52 999 123 4567'),
                'email' => config('branding.email', 'contacto@ixxitecnologia.com'),
                'address' => config('branding.address', 'Mérida, Yucatán, México'),
                'business_hours_weekdays' => 'Lunes a Viernes: 9AM - 6PM',
                'business_hours_weekends' => 'Sábados: 9AM - 2PM',
                'whatsapp' => config('branding.whatsapp', '529999999999'),
            ]);
        }

        return $info;
    }
}
