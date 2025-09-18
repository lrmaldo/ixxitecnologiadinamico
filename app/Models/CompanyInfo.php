<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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
     * Cache key for singleton
     */
    public static function cacheKey(): string
    {
        return 'company_info_singleton';
    }

    protected static function booted()
    {
        static::saved(function (self $model) {
            // Refresh cache on save
            Cache::put(self::cacheKey(), $model, now()->addMinutes(30));
        });
    }

    /**
     * Get the company info instance (singleton pattern)
     */
    public static function getInstance()
    {
        try {
            return Cache::remember(self::cacheKey(), now()->addMinutes(30), function () {
                $existing = self::first();
                if ($existing) {
                    return $existing;
                }
                return self::create([
                    'about_us' => 'Somos una empresa comprometida con la excelencia en servicios tecnológicos, enfocados en brindar soluciones innovadoras y de calidad para satisfacer las necesidades de nuestros clientes.',
                    'mission' => 'Nuestra misión es proporcionar soluciones tecnológicas innovadoras.',
                    'vision' => 'Ser líderes en transformación digital.',
                    'values' => 'Innovación, Calidad, Compromiso, Transparencia.'
                ]);
            });
        } catch (\Throwable $e) {
            // Fallback defensivo en caso de error de DB en producción
            $instance = new self();
            $instance->about_us = '';
            $instance->mission = '';
            $instance->vision = '';
            $instance->values = '';
            return $instance;
        }
    }
}
