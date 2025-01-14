<a {{ $attributes->class(['bg-gray-800', 'text-white', 'font-semibold', 'py-2', 'px-4', 'rounded-lg', 'transition', 'duration-300', 'ease-in-out', 'hover:bg-gray-600', 'focus:outline-none', 'focus:ring-2', 'active:bg-gray-800', 'active:text-white', 'rounded-full']) }}>
    {{--
        - bg-gray-800: Fondo gris predeterminado.
        - text-white: Texto blanco.
        - font-semibold: Fuente semi-negrita.
        - py-2: Relleno vertical.
        - px-4: Relleno horizontal.
        - rounded-lg: Bordes redondeados.
        - transition: Aplica una transición suave a los efectos de hover y focus.
        - duration-300: Duración de la transición en 300 milisegundos.
        - ease-in-out: Define un efecto de transición con inicio y fin suaves.
        - hover:bg-pink-700: Cambia el color del fondo a rosa oscuro cuando se pasa el ratón.
        - focus:outline-none: Elimina el borde de enfoque del enlace.
        - focus:ring-2: Añade un anillo de enfoque al enlace.
        - active:bg-gray-800: Mantiene el fondo gris cuando el enlace está presionado.
        - active:text-white: Mantiene el texto blanco cuando el enlace está presionado.
        - rounded-full: Bordes completamente redondeados.
    --}}
    {{ $slot }}
</a>

