<?php

namespace Qvers\XliffAnalyzer;

interface AnalyzerInterface
{
    public function analyzeFile($filePath);

    public function analyzeFiles($filePaths);
}
