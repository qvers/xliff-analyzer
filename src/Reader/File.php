<?php

namespace Qvers\XliffAnalyzer\Reader;

use http\Encoding\Stream;

class File
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Unit[]
     */
    private $units;

    public function __construct($name, $units)
    {
        $this->name = $name;
        $this->units = $units;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Unit[]
     */
    public function getUnits()
    {
        return $this->units;
    }
}
