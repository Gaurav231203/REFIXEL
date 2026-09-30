<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request): Response
    {
        $services = Database::fetchAll(
            "SELECT s.*, c.name as category_name FROM services s JOIN categories c ON s.category_id = c.id ORDER BY c.name ASC, s.name ASC"
        );
        $categories = Category::all('sort_order ASC');

        return $this->render('admin.services.index', [
            'title'      => 'Manage Services | Primodomus Admin',
            'services'   => $services,
            'categories' => $categories,
        ], 'admin');
    }

    public function categories(Request $request): Response
    {
        $categories = Category::all('sort_order ASC');
        return $this->render('admin.services.categories', [
            'title'      => 'Service Categories | Primodomus Admin',
            'categories' => $categories,
        ], 'admin');
    }
}
