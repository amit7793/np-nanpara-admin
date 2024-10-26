<?php

namespace App\Exports;
// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PropertyExport implements FromView


{

    private $getData;

    public function __construct($getData)
    {
        $this->getData = $getData;
    }


    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        $data = $this->getData;
        return view('property.property-export',  ['getData' => $data]);
    }
}
