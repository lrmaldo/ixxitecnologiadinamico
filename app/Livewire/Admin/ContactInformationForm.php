<?php

namespace App\Livewire\Admin;

use App\Models\ContactInformation;
use Livewire\Component;

class ContactInformationForm extends Component
{
    public $phone;
    public $email;
    public $address;
    public $business_hours_weekdays;
    public $business_hours_weekends;
    public $whatsapp;
    public $facebook;
    public $instagram;
    public $twitter;
    public $linkedin;

    public function mount()
    {
        $contactInfo = ContactInformation::getDefault();
        $socialMedia = $contactInfo->getSocialMediaLinks();
        
        $this->phone = $contactInfo->phone;
        $this->email = $contactInfo->email;
        $this->address = $contactInfo->address;
        $this->business_hours_weekdays = $contactInfo->business_hours_weekdays;
        $this->business_hours_weekends = $contactInfo->business_hours_weekends;
        $this->whatsapp = $contactInfo->whatsapp;
        $this->facebook = $socialMedia['facebook'] ?? null;
        $this->instagram = $socialMedia['instagram'] ?? null;
        $this->twitter = $socialMedia['twitter'] ?? null;
        $this->linkedin = $socialMedia['linkedin'] ?? null;
    }

    public function save()
    {
        $this->validate([
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'business_hours_weekdays' => 'nullable|string|max:100',
            'business_hours_weekends' => 'nullable|string|max:100',
            'whatsapp' => 'nullable|string|max:20',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
        ]);

        $contactInfo = ContactInformation::getDefault();
        
        $contactInfo->update([
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'business_hours_weekdays' => $this->business_hours_weekdays,
            'business_hours_weekends' => $this->business_hours_weekends,
            'whatsapp' => $this->whatsapp,
            'social_media' => [
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ],
        ]);

        session()->flash('success', 'Información de contacto actualizada correctamente');
    }

    public function render()
    {
        return view('livewire.admin.contact-information-form');
    }
}
