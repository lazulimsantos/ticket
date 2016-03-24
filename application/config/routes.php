<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['cms'] = "portal";
$route['cms/eventos'] = "eventos";
$route['cms/eventos/novo'] = "eventos/novo";
$route['cms/eventos/editar/(:num)'] = "eventos/editar/$1";
$route['cms/eventos/excluir/(:num)'] = "eventos/excluir/$1";
$route['cms/eventos/salvar'] = "eventos/salvar";
$route['cms/artistas'] = "bandas";
$route['cms/artistas/novo'] = "bandas/novo";
$route['cms/artistas/editar/(:num)'] = "bandas/editar/$1";
$route['cms/artistas/excluir/(:num)'] = "bandas/excluir/$1";
$route['cms/artistas/salvar'] = "bandas/salvar";
$route['cms/locais'] = "locais";
$route['cms/locais/novo'] = "locais/novo";
$route['cms/locais/editar/(:num)'] = "locais/editar/$1";
$route['cms/locais/excluir/(:num)'] = "locais/excluir/$1";
$route['cms/locais/salvar'] = "locais/salvar";
$route['cms/ingressos/cadastrar'] = "ingressos/cadastrar";
$route['404_override'] = '';

$route['ingressos/adicionar/(:num)'] = "ingressos/adicionar/$1";
$route['ingressos/favoritos/(:num)'] = "ingressos/favoritos/$1";



/* End of file routes.php */
/* Location: ./application/config/routes.php */