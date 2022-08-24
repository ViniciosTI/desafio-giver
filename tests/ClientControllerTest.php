<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class ClientControllerTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }
    public function testUploadFile()
    {
        $file = UploadedFile::fake()->image('avatar.csv');
        $this->post('/uploadFile', ["file", $file]);
    }
    public function testFindByPaginate()
    {
        $response = $this->call('GET', '/FindByPaginate/1');
        $this->assertEquals(200, $response->status());
    }
    public function testFindGraphItems()
    {
        $response = $this->call('GET', '/findGraphItems');
        $this->assertEquals(200, $response->status());
    }
}
