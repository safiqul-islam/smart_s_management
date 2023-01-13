<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meta;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{

    protected $metaModel;

//    public function __construct(Meta $meta)
//    {
//        $this->metaModel = new Crud($meta);
//    }

    public function maintenanceModeChange(Request $request)
    {
        if ($request->maintenance_mode == 1) {
            $request->validate(
                [
                    'maintenance_mode' => 'required',
                    'maintenance_secret_key' => 'required|min:6'
                ],
                [
                    'maintenance_secret_key.required' => 'The maintenance mode secret key is required.',
                ]
            );
        } else {
            $request->validate([
                'maintenance_mode' => 'required',
            ]);
        }

        $inputs = Arr::except($request->all(), ['_token']);
        $keys = [];

        foreach ($inputs as $k => $v) {
            $keys[$k] = $k;
        }

        foreach ($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['option_key' => $key]);
            $option->option_value = $value;
            $option->save();
        }

        if ($request->maintenance_mode == 1) {
            Artisan::call('up');
            $secret_key = 'down --secret="' . $request->maintenance_secret_key . '"';
            Artisan::call($secret_key);
        } else {
            $option = Setting::firstOrCreate(['option_key' => 'maintenance_secret_key']);
            $option->option_value = null;
            $option->save();
            Artisan::call('up');
        }

        $this->showToastrMessage('success', 'Maintenance Mode has been changed');
        return redirect()->back();
    }

    public function cacheUpdate($id)
    {
        if ($id == 1) {
            Artisan::call('view:clear');
            $this->showToastrMessage('success', 'Views cache cleared successfully.');
            return redirect()->back();
        } elseif ($id == 2) {
            Artisan::call('route:clear');
            $this->showToastrMessage('success', 'Route cache cleared successfully.');
            return redirect()->back();
        } elseif ($id == 3) {
            Artisan::call('config:clear');
            $this->showToastrMessage('success', 'Configuration cache cleared successfully.');
            return redirect()->back();
        } elseif ($id == 4) {
            Artisan::call('cache:clear');
            $this->showToastrMessage('success', 'Application cache cleared successfully.');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function migrateUpdate()
    {
        Artisan::call('migrate');
        $this->showToastrMessage('success', 'Migrated successfully.');
        return redirect()->back();
    }
}
