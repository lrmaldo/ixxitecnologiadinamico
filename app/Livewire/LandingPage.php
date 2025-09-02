<?php

namespace App\Livewire;

use App\Models\ContactInformation;
use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
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
        $services = Service::published()->orderBy('published_at', 'desc')->limit(8)->get();
        $featuredServices = $services->take(3);
        $testimonials = Testimonial::where('is_active', true)->latest()->limit(8)->get();
        $gallery = GalleryItem::where('is_active', true)->orderBy('position')->limit(12)->get();
        $posts = Post::published()->latest('published_at')->limit(3)->get();
        $visitCount = Cache::get('site_visits', 0);
        $contactInfo = ContactInformation::getDefault();

        return view('livewire.landing-page-new', compact(
            'services',
            'featuredServices',
            'testimonials',
            'gallery',
            'posts',
            'visitCount',
            'contactInfo'
        ))
            ->layout('components.layouts.public')
            ->title('IXXI TECNOLOGÍA | Seguridad tecnológica y de campo');
    }
}
