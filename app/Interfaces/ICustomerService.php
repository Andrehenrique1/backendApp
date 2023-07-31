<?php

interface ICustomerService
{
    public function storeOrUpdate($data);
    public function login($data);
}
