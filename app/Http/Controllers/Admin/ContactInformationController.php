<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    /**
     * Display the contact information form.
     */
    public function edit()
    {
        $contactInfo = ContactInformation::getDefault();
        return view('admin.contact-information.edit', compact('contactInfo'));
    }

    /**
     * Update the contact information.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'business_hours_weekdays' => 'nullable|string|max:100',
            'business_hours_weekends' => 'nullable|string|max:100',
            'whatsapp' => 'nullable|string|max:20',
            'social_media.facebook' => 'nullable|url|max:255',
            'social_media.instagram' => 'nullable|url|max:255',
            'social_media.twitter' => 'nullable|url|max:255',
            'social_media.linkedin' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.contact-information.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $contactInfo = ContactInformation::getDefault();
        
        $contactInfo->update([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'business_hours_weekdays' => $request->input('business_hours_weekdays'),
            'business_hours_weekends' => $request->input('business_hours_weekends'),
            'whatsapp' => $request->input('whatsapp'),
            'social_media' => [
                'facebook' => $request->input('social_media.facebook'),
                'instagram' => $request->input('social_media.instagram'),
                'twitter' => $request->input('social_media.twitter'),
                'linkedin' => $request->input('social_media.linkedin'),
            ],
        ]);

        return redirect()
            ->route('admin.contact-information.edit')
            ->with('success', 'Información de contacto actualizada correctamente');
    }
}
