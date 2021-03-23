<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['display_name'  => 'Site Title','section'   => 'general','description'   => 'Here You Will See Site Title','key'   => 'site_title','value' => '','type'  => 'text','ordering'  => 1]);
        Setting::create(['display_name'  => 'Site Description','section'   => 'general','description'   => 'Here You Will See Site description','key'   => 'site_description','value' => '','type'  => 'textarea','ordering'  => 2]);
        Setting::create(['display_name'  => 'Site Logo','section'   => 'header','description'   => 'Here You Will See Site Logo','key'   => 'logo','value' => '','type'  => 'file','ordering'  => 1]);
    }
}
