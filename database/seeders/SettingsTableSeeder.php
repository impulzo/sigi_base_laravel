<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Nombre de la empresa',
                'value'        => 'Empresa o Negocio',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Eslogan o descripción de la empresa',
                'value'        => 'Descripción de la empresa',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => NULL,
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => NULL,
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.address');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Dirección de la empresa',
                'value'        => '#',
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.email');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Correo electrónico de contacto',
                'value'        => 'example@gmail.com',
                'details'      => '',
                'type'         => 'text',
                'order'        => 7,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.phone');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Número de whatsapp de contacto',
                'value'        => '###-###-####',
                'details'      => '',
                'type'         => 'text',
                'order'        => 8,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.policies');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Políticas de la empresa',
                'value'        => '<div><div><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipisicing elit. Aspernatur, nulla eum libero officiis iste, blanditiis eos fugiat perspiciatis eius sint labore quia veritatis autem quod placeat porro, deleniti earum. Molestiae?</div></div>',
                'details'      => '',
                'type'         => 'rich_text_box',
                'order'        => 9,
                'group'        => 'Admin',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }   
}
