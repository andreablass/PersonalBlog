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
}