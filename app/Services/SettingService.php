<?php

namespace App\Services;

use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingService {
    public function update($settings, $data)
    {
        foreach ($settings as $st) {
            if (isset($data[$st->setting_var])) {
                if ($st->setting_type == 'file') {
                    if (isset($data[$st->setting_var]) && $data[$st->setting_var] != null) {
                        if ($st->setting_val != null && Storage::exists($st->setting_val)) {
                            Storage::delete($st->setting_val);
                        }
                        $data[$st->setting_var] = Storage::putFile('public/images', $data[$st->setting_var]);
                    }
                }
                Settings::where('setting_var', $st->setting_var)->update([
                    'setting_val' => $data[$st->setting_var]
                ]);
            }
        }
        return true;
    }
}
