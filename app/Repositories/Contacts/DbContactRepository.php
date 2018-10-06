<?php

namespace App\Repositories\Contacts;
use App\Repositories\BaseRepository;

class DbContactRepository extends BaseRepository implements ContactRepository
{
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

}
