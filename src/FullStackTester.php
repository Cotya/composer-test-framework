<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Cotya\ComposerTestFramework;

use Symfony\Component\Process\Process;

class FullStackTester
{
    
    protected $artifactPath;
    
    protected $composer;
    
    public function __construct(\SplFileInfo $artifactPath, Composer\Wrapper $composer)
    {
        $this->artifactPath = $artifactPath;
        $this->composer     = $composer;
    }
    
    public function addDirectoryToArtifact(\SplFileInfo $path)
    {
        $this->composer->archive($path, $this->getArtifactPath());
    }
    
    public function getArtifactPath()
    {
        return $this->artifactPath;
    }
}
