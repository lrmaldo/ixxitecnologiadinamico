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
    ];

    /**
     * Get the company info instance (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?: self::create([
            'mission' => 'Nuestra misión es proporcionar soluciones tecnológicas innovadoras.',
            'vision' => 'Ser líderes en transformación digital.',
            'values' => 'Innovación, Calidad, Compromiso, Transparencia.'
        ]);
    }
}
