<?php

namespace App\Repositories;

use App\Data\ClientData;
use App\Models\Client;

interface ClientRepositoryIO
{
  public function __construct(Client $clientModel);
  public function createNewClient(ClientData $client);
  public function findPaginate($page);
  public function findGraphItems();
  public function findAllEmails();
}
