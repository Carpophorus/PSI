<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Manager;

use Psi\AppBundle\Manager\StaticFileManagerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\AssetsHelper;

class StaticFileManager implements StaticFileManagerInterface
{

    private $rootDir;
    
    private $staticDir;
    
    private $helper;

    public function __construct($rootDir, AssetsHelper $helper)
    {
        $this->helper = $helper;
        $this->rootDir = $rootDir;
        $this->staticDir = realpath($rootDir . '/../web/static');
    }

    private function getStaticFileDir()
    {
        return $this->staticDir;
    }

    public function getFile($namespace, $filename)
    {
        $file = $this->rootDir . '/../web/static/' . $namespace . "/" . $filename;
        
        if (realpath($file)) {
            return $this->helper->getUrl("static/$namespace/$filename");
        }
        return false;
    }

    public function putFile($namespace, $filename, $sourceFile)
    {
        $dir = $this->getStaticFileDir();
        $file = $dir . "/" . $namespace . "/" . $filename;
        
        echo "Source: $sourceFile \r\n";
        echo "File: $file \r\n";
        
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
