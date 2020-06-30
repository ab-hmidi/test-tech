<?php declare(strict_types=1);

namespace App\Utils;

Interface TemplateManagerInterface
{
    /**
     * @param \App\Utils\Template $tpl
     * @param array $data
     * @return mixed
     */
    public function getTemplateComputed(Template $tpl, array $data);

}
