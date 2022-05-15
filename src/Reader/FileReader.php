<?php

namespace Qvers\XliffAnalyzer\Reader;

class FileReader implements ReaderInterface
{
    public function readFile($filePath)
    {
        $xml = simplexml_load_file($filePath);
        if ($xml === false) {
            return new File($filePath, []);
        }

        $rawData = json_decode(json_encode($xml), true);
        $transUnits = $rawData['file']['body']['trans-unit'];

        $units = [];
        foreach ($transUnits as $transUnit) {
            $units[] = new Unit(
                $transUnit['@attributes']['id'],
                $transUnit['source'],
                $transUnit['target']
            );
        }

        $file = new File($filePath, $units);

        return $file;
    }
}
