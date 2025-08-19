<?php
/**
 * Created by PhpStorm.
 * User: manugr21
 * Date: 10/03/19
 * Time: 10:55 PM
 */

namespace App\Utilidades\CMS;


use App\Funciones\Utilidades;
use App\Models\CategoriaCMS;
use App\Models\PaginaCMS;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Funciones
{
    public static function crearCarousel()
    {
        $imgs = File::allFiles('/var/www/html/rye-portal/public/img/carousel');
        $indicadores = "<ol class=\"carousel-indicators\">\n";
        $contenido = "<div class=\"carousel-inner\" role=\"listbox\">\n";
        $i = 0;
        foreach($imgs as $path)
        {
            $imagen = pathinfo($path);
            $ruta = $imagen['basename'];
            if($i == 0)
            {
                $indicadores = $indicadores . "\t<li data-target=\"#carousel\" data-slide-to=\"$i\" class=\"active\"></li>\n";
                $contenido = $contenido . "\t<div class=\"carousel-item active\">\n";
            }
            else
            {
                $indicadores = $indicadores . "\t<li data-target=\"#carousel\" data-slide-to=\"$i\"></li>\n";
                $contenido = $contenido . "\t<div class=\"carousel-item\">\n";
            }
            $contenido = $contenido . "\t\t<img class=\"d-block w-100\" src=\"{{ url('img/carousel/$ruta') }}\" />\n";
            $contenido = $contenido . "\t</div>\n";
            $i++;
        }
        $indicadores = $indicadores . "</ol>\n";
        $contenido = $contenido . "</div>\n";
        Storage::put("common/include/carousel.blade.php", $indicadores . $contenido);
    }

    /**
     * Crea el html a ser incluido en el navbar para desplegar el acceso a categorias y páginas.
     * Escribe el archivo /var/www/html/rye-portal/resources/views/portalEstudiantil/admin/prueba.blade.php
     */
    public static function crearHTML(){
        $categorias = CategoriaCMS::where('estado', 1)->get();
        $linksPublicos = '';
        foreach ($categorias as $categoria) {
            $linksPublicos .= "<li class=\"submenu\">\n";
            $linksPublicos .= "\t<a href=\"#\">\n"; //todo agregar ruta al link
            switch ($categoria->nombre){
                case 'Primer Ingreso':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-user\"></i>\n";
                    break;
                case 'Reingreso':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-university\"></i>\n";
                    break;
                case 'Postgrado':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-graduation-cap\"></i>\n";
                    break;
                case 'Incorporaciones':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-user-plus\"></i>\n";
                    break;
                case 'Equivalencias':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-balance-scale\"></i>\n";
                    break;
                case 'Títulos':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-file-archive-o\"></i>\n";
                    break;
                case 'Estadísticas':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-bar-chart\"></i>\n";
                    break;
                case 'Formularios':
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-files-o\"></i>\n";
                    break;
                default:
                    $linksPublicos .= "\t\t<i class=\"fa fa-fw fa-circle\"></i>\n";
            }
            $linksPublicos .= "\t\t<span>" . $categoria->nombre . "</span>\n";
            $linksPublicos .= "\t\t<span class=\"menu-arrow\"></span>\n";
            $linksPublicos .= "\t</a>\n";

            $linksPublicos .= "\t<ul class=\"list-unstyled\">\n";

            $paginas = PaginaCMS::where('idCategoria', $categoria->idCategoria)->where('estado', 1)->get();

            foreach($paginas as $pagina){
                $linksPublicos .= "\t\t<li><a href=\"". Utilidades::cleanString(url($pagina->ruta)) . "\">" . $pagina->nombre . "</a></li>\n";
            }
            $linksPublicos .= "\t</ul>\n";
            $linksPublicos .= "</li>\n";
        }
        Storage::put("common/include/categoriasSidebar.blade.php", $linksPublicos);
    }

    /**
     * Crea las rutas para todas las páginas administradas por el CMS
     * Escribe un archivo de rutas en /var/www/html/rye-portal/routes/portalEstudiantil/rutasCMS.php
     */
    public static function crearRutas(){
        $categorias = CategoriaCMS::all();
        $contenido = "<?php\n";
        foreach ($categorias as $categoria) {
            $paginas = PaginaCMS::where('idCategoria', $categoria->idCategoria)->get();
            foreach($paginas as $pagina){
                $contenido .= "Route::get('" . $pagina->ruta . "',";
                $contenido .= "function(){\n" .
                    "\treturn view('portalEstudiantil.admin." . Utilidades::cleanString(Str::camel($pagina->categoria->nombre) . "." . Str::camel($pagina->nombre) . "');\n") .
                "});\n";
            }
        }
        Storage::disk('routes')->put("portalEstudiantil/rutasCMS.php", $contenido);
    }
}
