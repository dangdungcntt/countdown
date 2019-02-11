<?php
/**
 * Created by PhpStorm.
 * User: dangdung
 * Date: 11/02/2019
 * Time: 23:49
 */

namespace App\Http\Services\Contracts;

use App\Template;

interface TemplateServiceContract
{
    public function render(Template $template, $data);
}
