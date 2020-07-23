<?php

namespace MyApp\Classes\Readers;
use League\Csv\Reader;
use League\Csv\Statement;

class CsvReader implements Readable {
    
    public $src;

    public function __construct($src){
        $this->src = $src;
    }

    public function getContent(){
        
        $csv = Reader::createFromPath($this->src, 'r');
        
        $stmt = (new Statement());
        
        $records = $stmt->process($csv);
        
        $data = [];
        foreach ($records as $record) {
            $data[] = $record;
        }
        return $data;

    }    
}