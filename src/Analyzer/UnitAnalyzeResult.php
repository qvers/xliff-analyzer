<?php

namespace Qvers\XliffAnalyzer\Analyzer;

class UnitAnalyzeResult
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $occurrences;

    /**
     * @param $id
     * @param $occurrences
     */
    public function __construct($id, $occurrences)
    {
        $this->id = $id;
        $this->occurrences = $occurrences;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOccurrences()
    {
        return $this->occurrences;
    }
}
