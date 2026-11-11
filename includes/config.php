<?php

declare(strict_types=1);

/**
 * Site-wide settings shared by every language.
 * Edit contact details and brand logos here - both pages update automatically.
 */
return [
    'site_name' => "Nature's Prime",

    // Used for the copyright year in the footer (store is in Richmond, BC).
    'timezone' => 'America/Vancouver',

    'phone' => '604-270-9900',
    'email' => 'naturesprime@yahoo.ca',

    // Brand logos shown in the "Manufacturer" section, two rows of four.
    // 'file' is relative to assets/brand_logos/, 'name' is used as the image alt text.
    'brands' => [
        [
            ['file' => 'logo_flora.jpg',        'name' => 'Flora'],
            ['file' => 'logo_nf.jpg',           'name' => 'Natural Factors'],
            ['file' => "logo_nature's_way.jpg", 'name' => "Nature's Way"],
            ['file' => 'logo_nulife.jpg',       'name' => 'Nu-Life'],
        ],
        [
            ['file' => 'logo_organika.jpg',     'name' => 'Organika'],
            ['file' => 'logo_quest.jpg',        'name' => 'Quest'],
            ['file' => 'logo_sisu.jpg',         'name' => 'SISU'],
            ['file' => 'logo_swiss.jpg',        'name' => 'Swiss Natural Sources'],
        ],
    ],
];
