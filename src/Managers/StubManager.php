<?php

namespace LunarExtend\Stub\Managers;

use Illuminate\Filesystem\Filesystem;

class StubManager
{

    protected Filesystem $files;

    protected string $stubContent = '';

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    public function load(string $stubPath) : self
    {
        if (!str_contains($stubPath, '.stub')) {
            $stubPath = __DIR__.'/../../stubs/'.$stubPath.'.stub';
        }

        $this->stubContent = $this->files->get($stubPath);

        return $this;
    }

    public function replace(string $stubKey, string $replacement)
    {
        $this->stubContent = str_replace("{{ $stubKey }}", $replacement, $this->stubContent);

        return $this;
    }

    public function get()
    {
        return $this->stubContent;
    }

    public function generate(string $path)
    {
        $this->files->put($path, $this->get());
    }

}