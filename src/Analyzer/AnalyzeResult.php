<?php

namespace Qvers\XliffAnalyzer\Analyzer;

class AnalyzeResult
{
    /**
     * @var FileAnalyzeResult[]
     */
    private $fileAnalyzeResults;

    public function __construct($fileAnalyzeResults)
    {
        $this->fileAnalyzeResults = $fileAnalyzeResults;
    }

    /**
     * @return FileAnalyzeResult[]
     */
    public function getFileAnalyzeResults()
    {
        return $this->fileAnalyzeResults;
    }
}
