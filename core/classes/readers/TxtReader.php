<?php 

namespace MyApp\Classes\Readers;

class TxtReader implements Readable{
    
    public $src;

    public function __construct($src){
        $this->src = $src;
    }

    public function getContent(){
        
        $files = file($this->src);
        $data = [];

        foreach($files as $file){
            $el[] = explode(";", str_replace('"', '', $file));
        }
        
        foreach($el as $row){
            list($id, $domain, $rang) = $row;
            $data[] = [
                'id' => $id,
                'domain' => $domain,
                'rang' => trim($rang)
            ];
        }

        return $data;
    }   
}