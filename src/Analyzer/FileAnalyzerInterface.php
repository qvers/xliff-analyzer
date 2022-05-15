<?php

namespace Qvers\XliffAnalyzer\Analyzer;

use Qvers\XliffAnalyzer\Reader\File;

interface FileAnalyzerInterface
{
    /**
     * @param File $file
     */
    public function analyze($file);
}