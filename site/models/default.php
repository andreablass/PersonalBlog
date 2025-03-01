<?php

use Kirby\Cms\Block;
use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

class defaultPage extends Page
{
    public function coverImage(): string
    {
        $coverImage = $this->getCoverImage();
    
        return match(true) {
            !empty($coverImage) => $coverImage, // Si se encontró una imagen, devuelve la URL
            default => '', // Si no se encontró imagen, devuelve un valor vacío
        };
    }
    
    protected function getCoverImage(): ?string
    {
        // Verifica si la página tiene bloques
        if ($this->blocks()->isEmpty()) {
            return null;
        }
    
        // Filtra los bloques para encontrar aquellos de tipo 'files'
        $image = $this
            ->blocks()
            ->toBlocks()
            ->filter(fn($block) => $block->type() === 'files')
            ->first(); // Obtiene el primer bloque de tipo 'file'
    
        // Si no se encuentra ninguna imagen, retorna null
        if ($image === null) {
            return null;
        }
    
        // Obtiene el primer archivo de imagen y retorna su URL
        $file = $image->toFile();
    
        // Si el archivo existe y es una imagen, devuelve su URL
        if ($file && $file->isImage()) {
            return $file->url();
        }
    
        // Si no es una imagen, retorna null
        return null;
    }
    
}