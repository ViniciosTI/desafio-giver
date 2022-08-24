<?php

namespace App\Repositories;

use App\Data\ClientData;
use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ClientRepository implements ClientRepositoryIO
{

    private $clientEloModel;

    public function __construct(Client $clientModel)
    {
        $this->clientEloModel = $clientModel;
    }

    public function createNewClient(ClientData $client)
    {
        $newClient = $this->clientEloModel;

        $newClient->firstName = $client->getFirstName();
        $newClient->lastName = $client->getLastName();
        $newClient->gender = $client->getGender();
        $newClient->email = $client->getEmail();
        return $newClient->save();
    }

    public function findPaginate($page)
    {
        return $this->clientEloModel->skip(($page - 1) * 10)->limit(10)->get();
    }

    public function findCountAllLines()
    {
        return $this->clientEloModel->all()->count();
    }

    public function findGraphItems()
    {
        return DB::select('select count(gender) as totalGender, count(lastName) as totalLastNameNull from clients');
    }

    public function findAllEmails()
    {
        return DB::select('select email from clients');
    }
}
