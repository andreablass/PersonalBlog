<footer class="border-t border-gray-200 shadow-lg py-6 bg-white">
  <div class="container mx-auto flex flex-col md:flex-row items-center text-center md:text-left gap-4 px-4 pr-24">
    <!-- padding right para que no quede debajo del botón fijo -->

    <div class="text-gray-600 text-sm whitespace-nowrap">
      <p>&copy; {{ date('Y') }} Andrea Blass. All rights reserved.</p>
    </div>

    <nav class="flex flex-wrap justify-start md:justify-start space-x-6 text-gray-700 text-sm font-medium ml-auto max-w-[60%]">
      @foreach(site()->footer()->toPages() as $page)
        <a href="{{ $page->url() }}" class="hover:text-purple-500 transition-colors duration-300 whitespace-nowrap">
          {{ $page->title() }}
        </a>
      @endforeach
    </nav>
  </div>
</footer>

<!-- Contenedor fijo para Buy Me a Coffee (botón siempre visible) -->
<div
  class="fixed bottom-6 right-6 z-50 w-36 md:w-72 max-w-[90vw]"
  style="pointer-events: auto;"
>
  <script
    data-name="BMC-Widget"
    data-cfasync="false"
    src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js"
    data-id="andyblass"
    data-description="Support me on Buy me a coffee!"
    data-message="Gracias por tu visita. Si valoras mi trabajo y mi proceso creativo, puedes apoyarme invitándome un café o regalándome un libro que inspire nuevas ideas y aprendizajes."
    data-color="#BD5FFF"
    data-position="Right"
    data-x_margin="18"
    data-y_margin="18"
  ></script>
</div>
