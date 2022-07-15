<?php

namespace App\Contracts\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;

trait TransferScope{
    public function scopeOfBankAccountId(Builder $query, $id = null){
        if($id == null){
            return $query;
        }else{
            return $query->where('origin_id' , $id)->orWhere('destination_id' , $id);
        }
    }
}