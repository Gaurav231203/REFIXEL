<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\ServiceArea;

class PageController extends Controller
{
    public function about(Request $request): Response
    {
        return $this->render('customer.about', ['title' => 'About Us | Primodomus'], 'customer');
    }

    public function faq(Request $request): Response
    {
        $faqs = Faq::getGlobal();
        return $this->render('customer.faq', ['title' => 'FAQs | Primodomus', 'faqs' => $faqs], 'customer');
    }

    public function gallery(Request $request): Response
    {
        $items = GalleryItem::getActive();
        return $this->render('customer.gallery', ['title' => 'Work Showcase | Primodomus', 'items' => $items], 'customer');
    }

    public function contact(Request $request): Response
    {
        $cities = ServiceArea::getActiveCities();
        return $this->render('customer.contact', ['title' => 'Contact Us | Primodomus', 'cities' => $cities], 'customer');
    }

    public function terms(Request $request): Response
    {
        return $this->render('customer.terms', ['title' => 'Terms & Conditions | Primodomus'], 'customer');
    }

    public function privacy(Request $request): Response
    {
        return $this->render('customer.privacy', ['title' => 'Privacy Policy | Primodomus'], 'customer');
    }

    public function refund(Request $request): Response
    {
        return $this->render('customer.refund', ['title' => 'Refund Policy | Primodomus'], 'customer');
    }

    public function blog(Request $request): Response
    {
        return $this->render('customer.blog', ['title' => 'Blog & Home Guides | Primodomus'], 'customer');
    }
}

