<?php


namespace App\Helpers;


class Directory
{
    public function __construct($directoryPath, $directoryPermissions)
    {
        $this->oldmask = umask(0);
        $this->directoryPath = $directoryPath;
        $this->directoryPermissions = $directoryPermissions;
    }

    public function create()
    {
        if (!is_dir($this->directoryPath))
            mkdir($this->directoryPath, $this->directoryPermissions, true);
        umask($this->oldmask);
    }
}
