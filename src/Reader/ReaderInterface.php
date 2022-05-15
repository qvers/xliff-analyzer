<?php

namespace Qvers\XliffAnalyzer\Reader;

interface ReaderInterface
{
    /**
     * @param string $filePath
     *
     * @return File
     */
    public function readFile($filePath);
}
