<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $table = 'company_info';

    protected $fillable = [
        'mission',
        'vision',
        'values',
        'about_us',
    ];

    /**
     * Get the company info instance (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?: self::create([
            'about_us' => 'Somos una empresa comprometida con la excelencia en servicios tecnológicos, enfocados en brindar soluciones innovadoras y de calidad para satisfacer las necesidades de nuestros clientes.',
            'mission' => 'Nuestra misión es proporcionar soluciones tecnológicas innovadoras.',
            'vision' => 'Ser líderes en transformación digital.',
            'values' => 'Innovación, Calidad, Compromiso, Transparencia.'
        ]);
    }
}
