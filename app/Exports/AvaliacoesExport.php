<?php

namespace App\Exports;

use App\Avaliacao;
use App\Cidade;
use App\Uf;
use Exception;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;



use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;

class AvaliacoesExport implements FromCollection, WithHeadings,  ShouldAutoSize, WithEvents
{

    protected $id_cidade;

    public function __construct($id_city)
    {
        $this->id_cidade = $id_city;
        
    }
    

   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
 
     $this->a = new Avaliacao();
     $arrayAvaliacoes = DB::table('avaliacoes')
     ->join('cidades', 'avaliacoes.id_cidade', '=', 'cidades.id')
     ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
     ->select('avaliacoes.nome_agente','avaliacoes.cpf_agente', 'avaliacoes.tipo_agente','cidades.descricao_cidade', 'ufs.descricao_uf', 'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
     'avaliacoes.radiobom_2','avaliacoes.radioRegular_2','avaliacoes.radioRuim_2','avaliacoes.radioSeguro_3','avaliacoes.radioPoucoSeguro_3',
     'avaliacoes.radioInseguro_3','avaliacoes.radioExcessiva_4','avaliacoes.radioRazoavel_4','avaliacoes.radioInsuficiente_4',
     'avaliacoes.radioMuito_5','avaliacoes.radiobom_5','avaliacoes.radioRegular_5','avaliacoes.radioRuim_5',
     'avaliacoes.radioMuito_6','avaliacoes.radiobom_6','avaliacoes.radioRegular_6','avaliacoes.radioRuim_6',
     'avaliacoes.radioMuito_7','avaliacoes.radiobom_7','avaliacoes.radioRegular_7','avaliacoes.radioRuim_7',
     'avaliacoes.radioMuito_8','avaliacoes.radiobom_8','avaliacoes.radioRegular_8','avaliacoes.radioRuim_8',
     'avaliacoes.radioMuito_9','avaliacoes.radiobom_9','avaliacoes.radioRegular_9','avaliacoes.radioRuim_9',
     'avaliacoes.radioMuito_10','avaliacoes.radiobom_10','avaliacoes.radioRegular_10','avaliacoes.radioRuim_10',
     'avaliacoes.descricao', 'avaliacoes.datahora', 'avaliacoes.updated_at as avaliacoes_updated_at')
     ->where('avaliacoes.id_cidade', $this->id_cidade)
     ->get();
     
     //return dd('yeah', $arrayAvaliacoes);
     return $arrayAvaliacoes;
 }


 public function headings(): array
 {
     return [

         'Nome',
         'Cpf',
         'Agente',
         'Cidade',
         'UF',
         'Sim',
         'Não',
         
         'Muito Bom',
         'Bom',
         'Regular',
         'Ruim',

         
         
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

        $styleCabecalho = [
                
            'font' =>[
                
                'bold'=>true,
                'color' => ['argb' => '#0b140e'],
                //'size'  => '30',
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => 'FFFF0000'],
                    ],

                ], 
        ];

        $styleTitulo = [
                
            'font' =>[
                
                'bold'=>true,
                'color' => ['argb' => '#0b140e'],
                'size'  => '30',
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => 'FFFF0000'],
                    ],

                ], 
                
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
               

        ];

        $styleSubTitulo = [
                
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
                'size'  => '11'

            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => '00000000'],
                ],

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],

              
            ],

        ];



                return [
            
            BeforeSheet::class => function (BeforeSheet $event) use ($styleArray, $styleTitulo, $styleSubTitulo, $styleCabecalho, $stylePerguntas){
              
                $cellRangeTitulo ='A1:AQ1';
                $cellRangeSubTitulo1 ='A3:E3';
                $cellRangeSubTitulo2 = 'F3:J3';
                $cellRangeSubTitulo3 =  'K3:S3';
                $cellRangeCabecalho = 'A5:AQ5';
                $cellRangePerguntas1 = 'A4:E4';                                //->mergeCells('F3:J3')->setCellValue('F3', 'Conteúdo Teórico')
                $cellRangePerguntas2 = 'F4:J4';

             
                            $event->sheet->getStyle($cellRangeCabecalho)->applyFromArray($styleCabecalho);
                

                             $event->sheet->setCellValue('A1', 'Avaliações')->mergeCells('A1:AQ1')
                                          ->getStyle($cellRangeTitulo)->applyFromArray($styleTitulo);
                                          
                             
                                            /***********SUB TITULOS***********/
                             
                            $event->sheet->setCellValue('A3', 'Dados Pessoais')->mergeCells('A3:E3')
                                          ->getStyle($cellRangeSubTitulo1)->applyFromArray($styleSubTitulo);
                            $event->sheet->mergeCells('F3:J3')->setCellValue('F3', 'Conteudo Teórico')
                                          ->getStyle($cellRangeSubTitulo2)->applyFromArray($styleSubTitulo);
                            //$event->sheet->mergeCells('K3:S3')->setCellValue('K3', 'Conteudo Prático')
                                         // ->getStyle($cellRangeSubTitulo3)->applyFromArray($styleSubTitulo);
                            
                             $event->sheet->mergeCells('A4:E4')->setCellValue('A4', '')
                               ->getStyle($cellRangePerguntas1)->applyFromArray($stylePerguntas);

                             $event->sheet->mergeCells('F4:J4')->setCellValue('F4', 'Proporcionou novos conhecimentos?')
                               ->getStyle($cellRangePerguntas2)->applyFromArray($stylePerguntas);

                                          //->mergeCells('K4:S4')->setCellValue('K4', 'Clareza/facilidade de trabalho')
                                          


                             


                },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $cellRange = 'A1:E1';
                $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
           
              //  $event->sheet->setCellValue('A6', '=SUM(A2:A5)');

            },
        ];
    }


}

