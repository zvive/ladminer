<?php

return [
    'embeddable' => false, // allows blade directive to embed in page via iframe.
    'plugins'    => [
        [
            // must match class in plugin file.
            'class'    => 'AdminerDatabaseHide',

            // filename must match in 'snake case' e.g. database-hide.php
            'name'     => 'DatabaseHide',
            'enabled'  => true,
            // if true it'll look for plugins in resources/vendor/ladminer/plugins folder
            // instead of package folder.
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDesigns',
            'name'     => 'Designs',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDumpBz2',
            'filename' => 'DumpBz2.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDumpDate',
            'filename' => 'DumpDate.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDumpJson',
            'filename' => 'DumpJson.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDumpXml',
            'filename' => 'DumpXml',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerDumpZip',
            'name'     => 'DumpZip',
            'enabled'  => true,
            'custom'   => false,
        ], [
            'class'    => 'AdminerEditCalendar',
            'filename' => 'EditCalendar',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerEditForeign',
            'filename' => 'EditForeign',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerEditTextarea',
            'filename' => 'EditTextarea',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerEnumOption',
            'filename' => 'EnumOption',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerEnumTypes',
            'filename' => 'EnumTypes',
            'enabled'  => true,
            'custom'   => false,
        ], [
            'class'    => 'AdminerEditCalendar',
            'filename' => 'EditCalendar',
            'enabled'  => true,
            'custom'   => false,
        ], [
            'class'    => 'AdminerForeignSystem',
            'filename' => 'ForeignSystem',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerJsonColumn',
            'filename' => 'JsonColumn',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerLoginOtp',
            'filename' => 'LoginOtp',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerLoginServers',
            'filename' => 'LoginServers',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerTablesFilter',
            'filename' => 'TablesFilter.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerTinymce',
            'filename' => 'Tinymce.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerFuzzySearch',
            'filename' => 'FuzzySearch.php',
            'enabled'  => true,
            'custom'   => false,
        ],
        [
            'class'    => 'AdminerPgDefaultPublicSchema',
            'filename' => 'PgDefaultPublicSchema.php',
            'enabled'  => true,
            'custom'   => false,
        ],
    ]
];
