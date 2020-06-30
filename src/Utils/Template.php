<?php

namespace App\Utils;

class Template implements TemplateInterface
{
    public $id;
    public $subject;
    public $content;

    /**
     * Template constructor.
     * @param $id
     * @param $subject
     * @param $content
     */
    public function __construct($id, $subject, $content)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->content = $content;
    }
}
