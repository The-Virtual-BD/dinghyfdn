<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $settings = [
            [ 'property' => 'donation', 'value' => 'yes' ],
            [ 'property' => 'newslettertxt', 'value' => 'Thanks for subscribing.' ],
            [ 'property' => 'donationtxt', 'value' => 'Thanks for donatin' ],
            [ 'property' => 'contactxt', 'value' => 'Thanks for your interest' ],
            [ 'property' => 'vapptxt', 'value' => 'Thanks for your interest' ],
            [ 'property' => 'japptxt', 'value' => 'Thanks for your interest' ],
            [ 'property' => 'donattarget', 'value' => '100000' ],
            [ 'property' => 'donatraised', 'value' => '0' ],
        ];


        foreach($settings as $setting){
            Setting::create($setting);
        }
    }
}
