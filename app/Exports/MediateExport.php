<?php

namespace App\Exports;

use App\Models\Mediate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MediateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $competition,$columns;

    function __construct(){
        
    }
    
    private $result = [];
    public function set_export_data($result){
        $this->result = $result;
    }

    public function collection(){
        return collect($this->result);
    }
}
