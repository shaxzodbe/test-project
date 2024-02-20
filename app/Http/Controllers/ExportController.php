<?php

namespace App\Http\Controllers;

use App\Models\ActivitySphere;
use App\Models\Entrepreneur;
use App\Models\Investor;
use App\Models\Project;
use App\Models\Region;
use App\Models\User;
use App\Services\PdfService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ExportController extends Controller
{
    protected $dataService;

    protected array $modelMapping = [
      'activity_spheres' => ActivitySphere::class,
      'entrepreneurs' => Entrepreneur::class,
      'permissions' => Permission::class,
      'investors' => Investor::class,
      'projects' => Project::class,
      'users' => User::class,
      'roles' => Role::class,
    ];

    public function __construct(PdfService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $type)
    {
        if (!array_key_exists($type, $this->modelMapping)) {
            abort(404, "Invalid type specified.");
        }

        $modelClass = $this->modelMapping[$type];
        $data = $modelClass::all();

        $pdf = PDF::loadView("pdf.{$type}", [
          'data' => $data,
          'title' => ucfirst(str_replace('_', ' ', $type)) . ' List'
        ]);
        return $pdf->download("{$type}" . '_list.pdf');
    }
}
