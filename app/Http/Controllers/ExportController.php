<?php

namespace App\Http\Controllers;

use App\Models\ActivitySphere;
use App\Services\PdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    protected $dataService;

    public function __construct(PdfService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke($format)
    {
        $activitySpheres = ActivitySphere::all();
        $pdf = PDF::loadView('pdf.activity_spheres', ['activitySpheres' => $activitySpheres, 'title' => 'Activity Spheres List']);
        return $pdf->download('activity_spheres_list.pdf');
    }
}
