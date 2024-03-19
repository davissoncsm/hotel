<?php

namespace App\Livewire\Hotel;

use App\Common\SearchZipCode;

trait SearchZipCodeTrait
{
    /**
     * @return void
     */
    public function searchZipCode(): void
    {
        if(!empty($this->zipCode)){
            $search = SearchZipCode::search(zipCode: $this->zipCode);

            $this->address = $search['logradouro'].' - '.$search['complemento'];
            $this->city = $search['localidade'];
            $this->state = $search['uf'];
            $this->enableForm = true;
            return;
        }

        $this->addError('zipcode not found', 'O campo CEP é obrigatório');
    }
}
