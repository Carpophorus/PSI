<?php
namespace Psi\AppBundle\Manager;

interface StaticFileManagerInterface
{

    public function getFile($namespace, $filename);

    public function putFile($namespace, $filename, $sourceFile);

    public function deleteFile($namespace, $filename);

    public function deleteFilesInNamespace($namespace);
}
