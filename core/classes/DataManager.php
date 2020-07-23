<?php

namespace MyApp\Classes;

use MyApp\Classes\Readers\Readable;

class DataManager {
    public $pathdir;

    public function __construct($pathdir){
        $this->pathdir = $pathdir;

        $this->getClassName();
    }

    public function getFiles(){
        return scandir($this->pathdir);
    }

    public function getClassName(){
        $files = $this->getFiles();
        foreach($files as $file){

            if($file !== '.' && $file !== '..'){
                $file = new \SplFileInfo($file);
                $reader = sprintf('%s\Readers\%sReader', __NAMESPACE__, ucfirst($file->getExtension()));

                $this->addSource(new $reader("$this->pathdir/{$file->getPathname()}"));
            }
        }
    }

    private function addSource(Readable $src){

        return $this->sources[] = $src;
    }

    public function getAll(){
        $result = [];
        foreach ($this->sources as $src) {
            
            $data = $src->getContent($src->src);
            
            foreach($data as $value){
           
                $result = array_merge($result, array_combine(
                    array_column($data, 'domain'),
                    array_column($data, 'rang')
                ));
            }
            
        }
        return $result;
    }
}