<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Ezek a beállítás-kulcsok jelennek meg az admin felületen
    private array $settingKeys = [
        'site_name' => 'Oldal neve',
        'foundation_name' => 'Alapítvány neve',
        'tax_number' => 'Adószám',
        'address' => 'Cím',
        'email' => 'Email cím',
        'phone' => 'Telefonszám',
        'bank_name' => 'Bank neve',
        'bank_account' => 'Bankszámlaszám',
        'stripe_public_key' => 'Stripe publikus kulcs',
        'stripe_secret_key' => 'Stripe titkos kulcs',
        'facebook_url' => 'Facebook URL',
        'instagram_url' => 'Instagram URL',
        'website_url' => 'Weboldal URL',
    ];

    public function index()
    {
        $settings = [];
        foreach ($this->settingKeys as $key => $label) {
            $settings[$key] = [
                'label' => $label,
                'value' => Setting::get($key, ''),
            ];
        }

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($this->settingKeys as $key => $label) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return back()->with('success', 'Beállítások mentve.');
    }
}
