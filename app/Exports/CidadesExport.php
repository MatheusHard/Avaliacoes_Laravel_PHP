<?php

namespace App\Exports;

use App\Uf;
use App\Cidade;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

use Illuminate\Support\Facades\DB;



class CidadesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable, RegistersEventListeners;

 protected $cidade;
 
    public function __construct(Cidade $c)
    {
       $this->cidade = $c;
    }

    /**
    * @return \Illuminate\   \Collection
    */
   public function collection()
    {
        $conditions=[];

        if(isset($this->cidade) && $this->cidade->uf_id > 0){
            $conditions[]=['cidades.uf_id', $this->cidade->uf_id];
        }else{
         $conditions[] = ['cidades.uf_id', '>', $this->cidade->uf_id];
        }
        $conditions [] = ['cidades.id' , '<>', 1 ];

       $cidades =  DB::table('cidades')
        ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
        ->select('cidades.descricao_cidade', 'ufs.descricao_uf')
        ->orderBy('cidades.descricao_cidade', 'asc')
        ->where($conditions)
        ->get();
        //var_dump($conditions);
        
       //return var_dump($cidades);
       return $cidades;
        
    }
   
    public function headings(): array
    {
        return [
            
            'Cidade',
            'Uf'
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
                'size'  => '16'

                ]
        ];

        $styleTitulo = [
                
            'font' =>[
                
                'bold'=>true,
                'color' => ['argb' => '#0b140e'],
                'size'  => '15'

            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '00000000'],
                ],
            ], 

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
           ];

        $stylePerguntas = [
                
            'font' =>[
                
                'bold'=>true,
                'color' => ['argb' => '#0b140e'],
                'size'  => '11',
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '00000000'],
                ],
            ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];
                return [
            
            BeforeSheet::class => function (BeforeSheet $event) use ($styleArray, $styleTitulo){
                
                $cellRangeTitulo ='A1:C1';

                 /****************************TITULOS***************************/

                 $event->sheet->setCellValue('A1', 'Clientes')->mergeCells('A1:C1')
                 ->getStyle($cellRangeTitulo)->applyFromArray($styleTitulo);
                 $event->sheet->setCellValue('A2', '')->mergeCells('A2:C2');

                },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray, $stylePerguntas) {

                $cellRangeHeardes1 = 'A3'; 
                $event->sheet->getStyle($cellRangeHeardes1)->applyFromArray($stylePerguntas);
                $cellRangeHeardes2 = 'B3'; 
                $event->sheet->getStyle($cellRangeHeardes2)->applyFromArray($stylePerguntas);
           
            },
        ];
    }
}
