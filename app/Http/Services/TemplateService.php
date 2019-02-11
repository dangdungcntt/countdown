<?php
/**
 * Created by PhpStorm.
 * User: dangdung
 * Date: 11/02/2019
 * Time: 23:49
 */

namespace App\Http\Services;

use App\Http\Services\Contracts\TemplateServiceContract;
use App\Template;

class TemplateService implements TemplateServiceContract
{
    public function render(Template $template, $data)
    {
        $viewName = 'templates-view.' . data_get($template, 'slug');

        return view()->exists($viewName)
            ? view($viewName, compact('data'))
            : false;
    }
}
