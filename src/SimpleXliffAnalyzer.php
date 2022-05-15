<?php

namespace Qvers\XliffAnalyzer;

use Qvers\XliffAnalyzer\Analyzer\AnalyzeResult;
use Qvers\XliffAnalyzer\Analyzer\FileAnalyzerInterface;
use Qvers\XliffAnalyzer\Reader\ReaderInterface;

class SimpleXliffAnalyzer implements AnalyzerInterface
{
    /**
     * @param ReaderInterface $reader
     * @param FileAnalyzerInterface $analyzer
     */
    public function __construct(ReaderInterface $reader, FileAnalyzerInterface $analyzer)
    {
        $this->reader = $reader;
        $this->analyzer = $analyzer;
    }

    public function analyzeFile($filePath)
    {
        return $this->analyzeFiles([$filePath]);
    }

    public function analyzeFiles($filePaths)
    {
        $fileAnalyzeResults = [];
        foreach ($filePaths as $filePath) {
            $file = $this->reader->readFile($filePath);
            //TODO: assoc for duplicate safe, rewrite later
            $fileAnalyzeResults[$filePath] = $this->doAnalyze($file);
        }

        $analyzeResult = new AnalyzeResult($fileAnalyzeResults);

        return $analyzeResult;
    }

    private function doAnalyze($file)
    {
        return $this->analyzer->analyze($file);
    }
}
