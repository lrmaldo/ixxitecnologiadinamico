<?php

namespace App\Livewire;

use App\Models\ContactInformation;
use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\CompanyInfo;
use App\Models\Alliance;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class LandingPage extends Component
{
    public function mount(): void
    {
        Cache::increment('site_visits');
    }

    public function render()
    {
        // Servicios: primero intentar tomar los marcados para el landing
        $landingSelected = Service::where('show_on_landing', true)
            ->where('is_active', true)
            ->orderBy('landing_order')
            ->get();

        if ($landingSelected->isNotEmpty()) {
            $services = $landingSelected;
        } else {
            // Servicios publicados (fallback si no hay seleccionados)
            $services = Service::published()->orderBy('published_at', 'desc')->limit(8)->get();
            if ($services->isEmpty()) {
                $services = Service::orderBy('created_at', 'desc')->limit(8)->get();
            }
        }

        $featuredServices = $services->take(3);
        $testimonials = Testimonial::where('is_active', true)->latest()->limit(8)->get();
        $gallery = GalleryItem::where('is_active', true)->orderBy('position')->limit(12)->get();
        // Alianzas activas
        $alliances = Alliance::where('is_active', true)->orderBy('position')->limit(12)->get();
        $visitCount = Cache::get('site_visits', 0);
        $contactInfo = ContactInformation::getDefault();
        $companyInfo = CompanyInfo::getInstance();

        // Crear JSON-LD para SEO
        $jsonLd = $this->generateJsonLd($contactInfo);

    return view('livewire.landing-page', compact(
            'services',
            'featuredServices',
            'testimonials',
            'gallery',
            'alliances',
            'visitCount',
            'contactInfo',
            'companyInfo',
            'jsonLd'
        ))
            ->layout('components.layouts.public')
            ->title('IXXI TECNOLOGÍA | Seguridad tecnológica y de campo');
    }

    /**
     * Genera el esquema JSON-LD para SEO
     *
     * @param ContactInformation|null $contactInfo
     * @return array
     */
    protected function generateJsonLd($contactInfo = null)
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "IXXI TECNOLOGÍA",
            "url" => url('/'),
            "logo" => asset('/img/logo.png'),
            "description" => "Soluciones integrales en seguridad tecnológica y de campo. CCTV, alarmas, control de acceso y más."
        ];

        // Añadir sameAs para redes sociales
        $sameAs = ["https://www.facebook.com/ixxitecnologia", "https://www.linkedin.com/company/ixxitecnologia", "https://twitter.com/ixxitecnologia"];

        if ($contactInfo && isset($contactInfo->social_media)) {
            $socialLinks = [];
            $socialMedia = $contactInfo->getSocialMediaLinks();

            if(!empty($socialMedia['facebook'])) $socialLinks[] = $socialMedia['facebook'];
            if(!empty($socialMedia['linkedin'])) $socialLinks[] = $socialMedia['linkedin'];
            if(!empty($socialMedia['twitter'])) $socialLinks[] = $socialMedia['twitter'];
            if(!empty($socialMedia['instagram'])) $socialLinks[] = $socialMedia['instagram'];

            if(!empty($socialLinks)) {
                $sameAs = $socialLinks;
            }
        }

        $schema["sameAs"] = $sameAs;

        // Añadir información de contacto
        if ($contactInfo) {
            $contactPoints = [
                [
                    "@type" => "ContactPoint",
                    "telephone" => $contactInfo->phone,
                    "contactType" => "customer service",
                    "areaServed" => "MX",
                    "availableLanguage" => ["Spanish"]
                ]
            ];

            if ($contactInfo->whatsapp) {
                $contactPoints[] = [
                    "@type" => "ContactPoint",
                    "telephone" => $contactInfo->whatsapp,
                    "contactType" => "technical support",
                    "areaServed" => "MX",
                    "contactOption" => ["TollFree"]
                ];
            }

            $schema["contactPoint"] = $contactPoints;
            $schema["address"] = [
                "@type" => "PostalAddress",
                "streetAddress" => $contactInfo->address,
                "addressCountry" => "MX"
            ];
            $schema["email"] = $contactInfo->email;
        } else {
            $schema["contactPoint"] = [
                "@type" => "ContactPoint",
                "telephone" => "+528123456789",
                "contactType" => "customer service",
                "areaServed" => "MX",
                "availableLanguage" => ["Spanish"]
            ];
        }

        return $schema;
    }
}
