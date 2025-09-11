<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyInfo;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyInfo::create([
            'mission' => 'Nuestra misión es proporcionar soluciones tecnológicas innovadoras que impulsen el crecimiento y la transformación digital de nuestros clientes, ofreciendo servicios de alta calidad con un enfoque personalizado.',
            'vision' => 'Ser reconocidos como líderes en el sector tecnológico, siendo la primera opción para empresas que buscan excelencia en desarrollo de software, consultoría IT y soluciones digitales.',
            'values' => 'Innovación: Buscamos constantemente nuevas formas de resolver problemas.\nCalidad: Nos comprometemos con la excelencia en cada proyecto.\nCompromiso: Cumplimos nuestras promesas y superamos expectativas.\nTransparencia: Mantenemos comunicación clara y honesta.\nTrabajo en equipo: Valoramos la colaboración y el respeto mutuo.'
        ]);
    }
}
