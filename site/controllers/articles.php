
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        // Simula que obtienes la página (puedes usar un modelo aquí).
        $page = (object) [
            'title' => 'Mi Página',
            'subtitle' => 'Este es el subtítulo',
            'categories' => collect(['Categoría 1', 'Categoría 2']),
            'myBlocksField' => function () {
                return collect([
                    (object) ['id' => 'block-1', 'type' => 'text', 'content' => '<p>Contenido del bloque 1</p>'],
                    (object) ['id' => 'block-2', 'type' => 'image', 'content' => '<img src="image.jpg">'],
                ]);
            },
        ];

        return view('page.show', [
            'site' => 'Mi Sitio Web',
            'page' => $page,
        ]);
    }
}
