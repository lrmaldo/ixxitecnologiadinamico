<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceShow extends Component
{
    public string $slug;

    public function mount(string $slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $service = Service::where('slug', $this->slug)->firstOrFail();
        return view('livewire.service-show', compact('service'))
            ->layout('components.layouts.public', [
                'title' => $service->seo_title ?: $service->title,
                'metaDescription' => $service->seo_description,
            ])
            ->title($service->seo_title ?: $service->title);
    }
}
