<?php

namespace WPUM\Composer\Installers;

class FuelphpInstaller extends BaseInstaller
{
    protected $locations = array('component' => 'components/{$name}/');
}
