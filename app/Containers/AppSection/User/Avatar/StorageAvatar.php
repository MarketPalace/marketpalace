<?php
/**
 * Contains the StorageAvatar class.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2018-11-18
 *
 */

namespace App\Containers\AppSection\User\Avatar;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Containers\AppSection\User\Contracts\Avatar;

final class StorageAvatar implements Avatar
{
    const CONFIG_ROOT_KEY = 'market_palace.user.avatar.storage.';

    /** @var string */
    private string $file;

    /** @var string */
    private string $path;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->path = self::config('path');
    }

    public static function upload(UploadedFile $uploadedFile): ?Avatar
    {
        $result = $uploadedFile->storePublicly(self::config('path'));

        if (false === $result) {
            return null;
        }

        return self::create($result);
    }

    public static function create(string $data = null): Avatar
    {
        return new self($data);
    }

    public function getData(): string
    {
        return $this->file;
    }

    public function getFilename(): string
    {
        return $this->file;
    }

    public function getUrl(string $variant = null): string
    {
        return Storage::url($this->file);
    }

    public function delete()
    {
        Storage::delete($this->file);
    }

    private static function config(string $key, $default = null)
    {
        return config(self::CONFIG_ROOT_KEY . $key, $default);
    }
}
