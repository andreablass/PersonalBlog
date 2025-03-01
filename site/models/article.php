<?php

use Kirby\Cms\Block;
use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

class ArticlePage extends Page
{
    public function  abstract(): string
    {
        $abstract = $this->getAbstract();

        return match(true) {
            !empty($abstract) => $abstract,
            $this->subtitle()->isNotEmpty() => $this->subtitle(),
            default => $this->title(),
        };
    }

    protected function getAbstract(): null|string
    {
        if ($this->blocks()->isEmpty()) {
            return null;
        }

        $text = $this
            ->blocks()
            ->toBlocks()
            ->filter(fn($block) => $block->type() === 'text');

        if($text->isEmpty()) {
            return null;
        }

        return Str::excerpt($text);
    }

    public function coverImage(): null|string
    {
        // Accede al campo 'cover_image' y obtiene el primer archivo
        $file = $this->cover_image()->toFile();

        // Si existe un archivo y es una imagen, devuelve su URL
        return $file && $file->isImage() ? $file->url() : null;
    
    }
}