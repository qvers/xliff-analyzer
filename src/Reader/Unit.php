<?php

namespace Qvers\XliffAnalyzer\Reader;

class Unit
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $translation;

    /**
     * @param $id
     * @param $source
     * @param $translation
     */
    public function __construct($id, $source, $translation)
    {
        $this->id = $id;
        $this->source = $source;
        $this->translation = $translation;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }
}
