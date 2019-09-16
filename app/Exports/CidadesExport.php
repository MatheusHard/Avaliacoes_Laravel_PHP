<?php

namespace App\Exports;

use App\Cidade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class CidadesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cidade::all();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Cidade',
            'Uf',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {

        $styleArray = [
                
            'font' =>[
                
                'bold'=>true,
                'color' => ['argb' => 'FFFF0000'],
                ]

        ];

                return [
            
            BeforeSheet::class => function (BeforeSheet $event) use ($styleArray){
                $event->sheet->setCellValue('A1', 'Planilha das Cidades');
                },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $cellRange = 'A1:E1';
                $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
            //SOMA:
                $event->sheet->setCellValue('A6', '=SUM(A1:A5)');
            
            },
        ];
    }


}
