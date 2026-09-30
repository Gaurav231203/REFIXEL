<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\ProcessStep;
use App\Models\Review;
use App\Models\ServiceArea;

class ContentController extends Controller
{
    public function faqs(Request $request): Response
    {
        $faqs = Faq::all('sort_order ASC');
        return $this->render('admin.content.faqs', ['title' => 'Manage FAQs | Primodomus Admin', 'faqs' => $faqs], 'admin');
    }

    public function gallery(Request $request): Response
    {
        $items = GalleryItem::all('sort_order ASC');
        return $this->render('admin.content.gallery', ['title' => 'Manage Gallery | Primodomus Admin', 'items' => $items], 'admin');
    }

    public function reviews(Request $request): Response
    {
        $reviews = Review::all('created_at DESC');
        return $this->render('admin.content.reviews', ['title' => 'Review Approval | Primodomus Admin', 'reviews' => $reviews], 'admin');
    }

    public function areas(Request $request): Response
    {
        $areas = ServiceArea::all('city ASC, pincode ASC');
        return $this->render('admin.content.areas', ['title' => 'Service Areas & Pincodes | Primodomus Admin', 'areas' => $areas], 'admin');
    }

    public function steps(Request $request): Response
    {
        $steps = ProcessStep::all('step_no ASC');
        return $this->render('admin.content.steps', ['title' => 'Workflow Steps | Primodomus Admin', 'steps' => $steps], 'admin');
    }
}
