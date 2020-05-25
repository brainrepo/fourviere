<?php

namespace Tests\Feature\api;

use App\Episode;
use Tests\Feature\api\CrudApiTest;

class EpisodeApiTest extends CrudApiTest
{
    public function testIndex()
    {
        parent::index('/api/episodes', Episode::class);
    }

    public function testStoreWithValidData()
    {
        parent::storeWithValidData('/api/episodes', Episode::class, 'episodes');
    }

    public function testStoreWithInvalidData()
    {
        parent::storeWithInvalidData('/api/episodes', Episode::class, 'title');
    }

    public function testShow()
    {
        parent::show('/api/episodes', Episode::class);
    }

    public function testUpdateWithValidData()
    {
        parent::updateWithValidData('/api/episodes', Episode::class, 'episodes', 'title', 'Connected');
    }

    public function testUpdateWithInvalidData()
    {
        parent::updateWithInvalidData('/api/episodes', Episode::class, 'episodes', 'explicit', 'it must to be a boolean');
    }

    public function testDelete()
    {
        parent::deleteData('/api/episodes', Episode::class, 'episodes');
    }
}
