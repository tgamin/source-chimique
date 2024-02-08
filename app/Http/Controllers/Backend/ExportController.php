<?php

namespace App\Http\Controllers\Backend;

use App\Exports\DemandesExport;
use App\Exports\InscriptionsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{


    public function index($slug) {
        switch ($slug) {
            case 'demandes':
                return Excel::download(new DemandesExport, 'demandes-'.date('d-m-Y').'.xlsx');
                break;
            case 'evenement-inscriptions':
                return Excel::download(new InscriptionsExport, 'Inscriptions-SFM-institute-'.date('d-m-Y').'.xlsx');
                break;
            default:
                return abort(404);
                break;
        }
        return abort(404);
    }

}
