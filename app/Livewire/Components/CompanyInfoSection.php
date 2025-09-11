<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\CompanyInfo;

class CompanyInfoSection extends Component
{
    public $companyInfo;

    public function mount()
    {
        $this->companyInfo = CompanyInfo::getInstance();
    }

    public function render()
    {
        return view('livewire.components.company-info-section');
    }
}
