<?php
/**
 * Created by PhpStorm.
 * User: dangdung
 * Date: 11/02/2019
 * Time: 21:12
 */

return [
    'site_store' => [
        'name.required' => 'Site name field is required.',
        'slug.required' => 'Site URL field is required.',
        'slug.unique' => 'Site URL has already been taken.',
        'template_id.required' => 'Template field is required.',
        'template_id.exists' => 'The selected template is invalid.',
        'data.array' => 'Invalid Site data.'
    ]
];
