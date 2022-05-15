<?php

namespace Qvers\XliffAnalyzer\Analyzer;

use Qvers\XliffAnalyzer\Reader\File;
use Qvers\XliffAnalyzer\Reader\Unit;

/**
 * @internal
 */
class SimpleFileAnalyzer implements FileAnalyzerInterface
{
    /**
     * @var array
     */
    private $cache = [];

    /**
     * @var array
     */
    private $result = [];

    /**
     * @param File $file
     */
    public function analyze($file)
    {
        if ($this->existInCache($file->getName())) {
            return $this->getFromCache($file->getName());
        }

        foreach ($file->getUnits() as $unit) {
            $this->doAnalyze($unit);
        }

        $fileAnalyzeResult = $this->buildResultForFile($file->getName());

        $this->insertIntoCache($fileAnalyzeResult);
        $this->preExit();

        return $fileAnalyzeResult;
    }

    /**
     * @param Unit $unit
     */
    private function doAnalyze($unit)
    {
        $this->calculateOccurrences($unit);
    }

    private function calculateOccurrences($unit)
    {
        if (!isset($this->result[$unit->getId()])) {
            $this->result[$unit->getId()] = 1;
        } else {
            $this->result[$unit->getId()] += 1;
        }
    }

    /**
     * @param string $fileName
     */
    private function buildResultForFile($fileName)
    {
        $unitResults = [];
        foreach ($this->result as $key => $value) {
            $unitResults[] = new UnitAnalyzeResult($key, $value);
        }
        $fileAnalyzeResult = new FileAnalyzeResult($fileName, $unitResults);

        return $fileAnalyzeResult;
    }

    private function clearCache()
    {
        $this->cache = [];
    }

    private function getFromCache($name)
    {
        return $this->cache[$name];
    }

    /**
     * @param string $name
     */
    private function existInCache($name)
    {
        if (array_key_exists($name, $this->cache)) {
            return true;
        }

        return false;
    }

    /**
     * @param FileAnalyzeResult $fileAnalyzeResult
     */
    private function insertIntoCache($fileAnalyzeResult)
    {
        $this->cache[$fileAnalyzeResult->getName()] = $fileAnalyzeResult;
    }

    private function preExit()
    {
        $this->clearTempStorage();
    }

    private function clearTempStorage()
    {
        $this->result = [];
    }
}
