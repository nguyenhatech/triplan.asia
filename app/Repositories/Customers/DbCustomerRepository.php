<?php

namespace App\Repositories\Customers;
use App\Repositories\BaseRepository;

class DbCustomerRepository extends BaseRepository implements CustomerRepository
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

}
