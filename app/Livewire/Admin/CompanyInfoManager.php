<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\CompanyInfo;
use Livewire\Attributes\Title;

#[Title('Información de la Empresa')]
class CompanyInfoManager extends Component
{
    public $mission;
    public $vision;
    public $values;
    public $companyInfo;

    public function mount()
    {
        $this->companyInfo = CompanyInfo::getInstance();
        $this->mission = $this->companyInfo->mission;
        $this->vision = $this->companyInfo->vision;
        $this->values = $this->companyInfo->values;
    }

    public function rules()
    {
        return [
            'mission' => 'required|string|min:10',
            'vision' => 'required|string|min:10',
            'values' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'mission.required' => 'La misión es obligatoria.',
            'mission.min' => 'La misión debe tener al menos 10 caracteres.',
            'vision.required' => 'La visión es obligatoria.',
            'vision.min' => 'La visión debe tener al menos 10 caracteres.',
            'values.required' => 'Los valores son obligatorios.',
            'values.min' => 'Los valores deben tener al menos 10 caracteres.',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->companyInfo->update([
            'mission' => $this->mission,
            'vision' => $this->vision,
            'values' => $this->values,
        ]);

        session()->flash('message', 'Información de la empresa actualizada exitosamente.');
    }

    public function render()
    {
        return view('livewire.admin.company-info-manager');
    }
}
