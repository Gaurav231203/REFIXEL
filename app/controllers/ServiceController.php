<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceChecklistItem;

class ServiceController extends Controller
{
    public function index(Request $request): Response
    {
        $categories = Category::getActive();
        return $this->render('customer.services.index', [
            'title'      => 'All Services | Primodomus',
            'categories' => $categories,
        ], 'customer');
    }

    public function categoryInCity(Request $request, string $category, string $city): Response
    {
        $cat = Category::findBySlug($category);
        if (!$cat) {
            return $this->render('partials.404', ['title' => 'Category Not Found'], 'customer')->setStatusCode(404);
        }

        $services = Service::getActiveByCategory((int)$cat['id']);
        $cityName = ucwords(str_replace('-', ' ', $city));

        return $this->render('customer.services.category', [
            'title'      => "{$cat['name']} Services in {$cityName} | Primodomus",
            'category'   => $cat,
            'services'   => $services,
            'city'       => $cityName,
        ], 'customer');
    }

    public function serviceInCity(Request $request, string $service, string $city): Response
    {
        $svc = Service::findBySlug($service);
        if (!$svc) {
            return $this->render('partials.404', ['title' => 'Service Not Found'], 'customer')->setStatusCode(404);
        }

        $cityName = ucwords(str_replace('-', ' ', $city));
        $checklist = ServiceChecklistItem::getByService((int)$svc['id']);
        $faqs = Faq::getByService((int)$svc['id']);

        return $this->render('customer.services.show', [
            'title'     => "{$svc['name']} in {$cityName} | Primodomus",
            'service'   => $svc,
            'city'      => $cityName,
            'checklist' => $checklist,
            'faqs'      => $faqs,
        ], 'customer');
    }
}
