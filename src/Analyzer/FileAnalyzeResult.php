<?php

namespace Qvers\XliffAnalyzer\Analyzer;

class FileAnalyzeResult
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var UnitAnalyzeResult[]
     */
    private $unitAnalyzeResults;

    public function __construct($name, $unitAnalyzeResults)
    {
        $this->name = $name;
        $this->unitAnalyzeResults = $unitAnalyzeResults;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return UnitAnalyzeResult[]
     */
    public function getUnitAnalyzeResults()
    {
        return $this->unitAnalyzeResults;
    }
}
