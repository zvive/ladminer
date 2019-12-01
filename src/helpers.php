<?php

if (!function_exists('adminer_object')) {
    function adminer_object()
    {
        if (!$this->allowAdminer === true) {
            return;
        }
        $plugin_path =  __DIR__.'./../plugins';
        $plugin_main = $plugin_path . '/plugin.php';
        $plugins     = config('ladminer.plugins');
        $enabled     = [];
        include_once($plugin_main);

        if (!$isAllowed) {
            return;
        }

        foreach ($plugins as $plugin) {
            $path = $plugin['custom'] === true
            ? resource_path('/vendors/ladminer/plugins')
            : $this->plugin_path;
            $filename    = snake_case($plugin['name']) . '.php';
            $plugin_file = "{$path}/{$filename}";

            if (file_exists($plugin_file)) {
                include_once($plugin_file);
                $enabled[] = new $plugin['class']();
            }
        }

        return new AdminerPlugin($enabled);
    }
}
