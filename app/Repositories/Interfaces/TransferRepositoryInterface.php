<?php

namespace App\Repositories\Interfaces;

interface TransferRepositoryInterface{
  
    public function find($id);
    
    public function getAll();
    
    public function create($data);
                           
  }