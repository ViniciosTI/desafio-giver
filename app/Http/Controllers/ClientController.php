<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ClientService;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{

    public function uploadFile(Request $request)
    {
        if ($request->has('file') && $request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file("file");

            $service = new ClientService();

            $service->receiveFile($file);
            return response()->json($file);
        }
    }

    public function findByPaginate($page)
    {
        $service = new ClientService();

        $clients = $service->findPaginate($page);

        return response()->json($clients);
    }

    public function findGraphItems()
    {
        $service = new ClientService();

        $graph = $service->findGraphItems();

        return response()->json($graph);
    }
}
