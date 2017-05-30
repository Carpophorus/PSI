<?php
namespace Psi\AppBundle\Manager;

class StaticFileManager
{

    public function __construct()
    {
        
    }

    private function getStaticFileDir()
    {
        
    }

    public function getFile($namespace, $filename)
    {
        $dir = $this->getStaticFileDir();
        $file = $dir . "/" . $namespace . "/" . $filename;
        if (file_exists($file)) {
            return $file;
        }
        return false;
    }

    public function putFile($namespace, $filename, $sourceFile)
    {
        $dir = $this->getStaticFileDir();
        $file = $dir . "/" . $namespace . "/" . $filename;
        copy($sourceFile, $file);
    }

    public function deleteFile($namespace, $filename)
    {
        $dir = $this->getStaticFileDir();
        $file = $dir . "/" . $namespace . "/" . $filename;
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public function deleteFilesInNamespace($namespace)
    {
        $dir = $this->getStaticFileDir() . $namespace;
        foreach (glob("$dir/*") as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
