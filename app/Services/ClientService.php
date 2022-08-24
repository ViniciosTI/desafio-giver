<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Client;
use App\Services\Consume\File\File;
use App\Services\Consume\File\FileEnum;
use App\Data\ClientData;
use App\Repositories\ClientRepository;

class ClientService
{
    public function receiveFile($file)
    {
        $fileApi = new File(FileEnum::SIMPLE);

        $fieldsArray = $fileApi->getFieldsCSV($file);
        $fileApi->storage($file);

        $this->saveFieldsFile($fieldsArray);
    }

    public function findPaginate($page)
    {
        $ClientRepository = new ClientRepository(new Client);
        $clients = $ClientRepository->findPaginate($page);
        return $this->factoryResponseClientsList($clients);
    }

    public function findGraphItems()
    {
        $ClientRepository = new ClientRepository(new Client);

        $totalCount = $ClientRepository->findCountAllLines();
        $clients = $ClientRepository->findGraphItems();
        $emails = (array) $ClientRepository->findAllEmails();

        $validEmails = $this->getValidEmails($emails, $totalCount);

        return ["withLastName" => $clients[0]->totalLastNameNull, "withGender" => $clients[0]->totalGender, "validEmails" => $validEmails, "totalCount" => $totalCount];
    }

    private function getValidEmails($emails, $total)
    {
        $count = 0;        
        for ($i = 0; $i < $total; $i++) {
            Log::info($emails[$i]->email);
            if (filter_var($emails[$i]->email, FILTER_VALIDATE_EMAIL)) {
                $count++;
            }
        }
        return $count;
    }

    private function factoryResponseClientsList($clientList)
    {
        $newClientList = array();

        $pages = $this->getPages();

        $i = 0;
        foreach ($clientList as $client) {
            $newClient = new ClientData(
                $client->firstName,
                $client->lastName,
                $client->gender,
                $client->email,
                $client->id,
                $pages
            );

            $newClientList[$i] = $newClient;

            $i++;
        }

        return $newClientList;
    }

    private function getPages()
    {
        $clientRepository = new ClientRepository(new Client);
        $pages = array();
        $total = $clientRepository->findCountAllLines();
        for ($i = 0; $i < ($total / 10); $i++) {
            $pages[$i] = $i;
        }
        return $pages;
    }

    private function saveFieldsFile($fieldsArray)
    {
        foreach ($fieldsArray as $fields) {
            $clientRepository = new ClientRepository(new Client);

            $firstName = $fields[0] == "" ? null : $fields[0];
            $lastName = $fields[1] == "" ? null : $fields[1];
            $email = $fields[2] == "" ? null : $fields[2];
            $gender = $fields[3] == "" ? null : $fields[3];

            $client = new ClientData($firstName, $lastName, $email, $gender);

            $clientRepository->createNewClient($client);
        }
    }
}
