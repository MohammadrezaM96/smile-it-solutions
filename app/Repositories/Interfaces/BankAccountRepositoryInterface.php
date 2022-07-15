<?php

namespace App\Repositories\Interfaces;

interface BankAccountRepositoryInterface{
  
    public function find($id);
    
    public function getAll();
    
    public function create($data);
                           
  }