<?php

/**
 * @file plugins/themes/ahlamzyy/AhlamZyyThemePlugin.inc.php
 *
 * AhlamZyy Premium Theme
 * Based on the OJS Default theme
 */

import('lib.pkp.classes.plugins.ThemePlugin');

class AhlamZyyThemePlugin extends ThemePlugin
{
    public function getName()
    {
        return 'AhlamZyyThemePlugin';
    }

    public function getDisplayName()
    {
        return 'AhlamZyy Premium Theme';
    }

    public function getDescription()
    {
        return 'Premium modern journal theme by Hasil Alami, based on Default Theme.';
    }

    public function isActive()
    {
        if (defined('SESSION_DISABLE_INIT')) return true;
        return parent::isActive();
    }

    public function init()
    {
        AppLocale::requireComponents(
            LOCALE_COMPONENT_PKP_MANAGER,
            LOCALE_COMPONENT_APP_MANAGER
        );

        $this->setParent('defaultthemeplugin');

        // 1. Fondasi & komponen kecil
        $this->addStyle('ahlamzyy-base',       'styles/ahlamzyy-base.css');
        $this->addStyle('ahlamzyy-components', 'styles/ahlamzyy-components.css');

        // 2. Struktur besar layout
        $this->addStyle('ahlamzyy-header',     'styles/ahlamzyy-header.css');
        $this->addStyle('ahlamzyy-footer',     'styles/ahlamzyy-footer.css');
        $this->addStyle('ahlamzyy-sidebar',    'styles/ahlamzyy-sidebar.css');

        // 3. Halaman / konteks
        $this->addStyle('ahlamzyy-portal',     'styles/ahlamzyy-portal.css');
        $this->addStyle('ahlamzyy-homepage',   'styles/ahlamzyy-homepage.css');
        $this->addStyle('ahlamzyy-journal',    'styles/ahlamzyy-journal.css');
        $this->addStyle('ahlamzyy-issue',      'styles/ahlamzyy-issue.css');
        $this->addStyle('ahlamzyy-article',    'styles/ahlamzyy-article.css');

        // 4. Mode / utilitas lanjutan
        $this->addStyle('ahlamzyy-darkmode',   'styles/ahlamzyy-darkmode.css');

        // JS tema umum (kalau nanti mau pakai)
        $this->addScript(
        'ahlamzyy-js',
        'js/ahlamzyy.js',
        ['priority' => STYLE_SEQUENCE_LAST] // pastikan load paling akhir
        );
    }

    public function getContextSpecificPluginSettingsFile()
    {
        return $this->getPluginPath() . '/settings.xml';
    }

    public function getInstallSitePluginSettingsFile()
    {
        return $this->getPluginPath() . '/settings.xml';
    }
}
