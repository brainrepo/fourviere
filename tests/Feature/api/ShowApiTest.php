<?php

namespace Tests\Feature\api;

use App\Show;
use Tests\Feature\api\CrudApiTest;

class ShowApiTest extends CrudApiTest
{
    public function testIndex()
    {
        parent::index('/api/shows', Show::class);
    }

    public function testStoreWithValidData()
    {
        parent::storeWithValidData('/api/shows', Show::class, 'shows');
    }

    public function testStoreWithInvalidData()
    {
        parent::storeWithInvalidData('/api/shows', Show::class, 'title');
    }

    public function testShow()
    {
        parent::show('/api/shows', Show::class);
    }

    public function testUpdateWithValidData()
    {
        parent::updateWithValidData('/api/shows', Show::class, 'shows', 'title', 'Connected');
    }

    public function testUpdateWithInvalidData()
    {
        parent::updateWithInvalidData('/api/shows', Show::class, 'shows', 'email', 'wrongemailaddress');
    }

    public function testDelete()
    {
        parent::deleteData('/api/shows', Show::class, 'shows');
    }
}
