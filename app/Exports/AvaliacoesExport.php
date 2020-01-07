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
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


use PhpOffice\PhpSpreadsheet\Spreadsheet;



use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AvaliacoesExport implements FromCollection, WithHeadings,  ShouldAutoSize, WithEvents
{
    use Exportable, RegistersEventListeners;

    protected $id_cidade;
    protected $stringBuilder;
    protected $arraySize = [];

    
    public function __construct(Avaliacao $a)
    {
        $this->id_cidade = $a->cidade_id;
        
    }
    
   
   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
         
        $conditions=[];

        if(isset($this->id_cidade) && $this->id_cidade > 0){
            $conditions[]=['avaliacoes.cidade_id', $this->id_cidade];
        }else{
            $conditions[] = ['avaliacoes.cidade_id',  '>' , $this->id_cidade];
        }
    
     $this->a = new Avaliacao();

     $arrayAvaliacoes = DB::table('avaliacoes')
     ->join('cidades', 'avaliacoes.cidade_id', '=', 'cidades.id')
     ->join('ufs', 'cidades.uf_id', '=', 'ufs.id')
     ->select('avaliacoes.descricao_profissional','avaliacoes.cpf_profissional', 'avaliacoes.descricao_tipo_profissional', 'cidades.descricao_cidade', 'ufs.descricao_uf',
     'avaliacoes.radioSim_1','avaliacoes.radioNao_1','avaliacoes.radioMuito_2',
     'avaliacoes.radiobom_2','avaliacoes.radioRegular_2','avaliacoes.radioRuim_2','avaliacoes.radioSeguro_3','avaliacoes.radioPoucoSeguro_3',
     'avaliacoes.radioInseguro_3','avaliacoes.radioExcessiva_4','avaliacoes.radioRazoavel_4','avaliacoes.radioInsuficiente_4',
     'avaliacoes.radioMuito_5','avaliacoes.radiobom_5','avaliacoes.radioRegular_5','avaliacoes.radioRuim_5',
     'avaliacoes.radioMuito_6','avaliacoes.radiobom_6','avaliacoes.radioRegular_6','avaliacoes.radioRuim_6',
     'avaliacoes.radioMuito_7','avaliacoes.radiobom_7','avaliacoes.radioRegular_7','avaliacoes.radioRuim_7',
     'avaliacoes.radioMuito_8','avaliacoes.radiobom_8','avaliacoes.radioRegular_8','avaliacoes.radioRuim_8',
     'avaliacoes.radioMuito_9','avaliacoes.radiobom_9','avaliacoes.radioRegular_9','avaliacoes.radioRuim_9',
     'avaliacoes.radioMuito_10','avaliacoes.radiobom_10','avaliacoes.radioRegular_10','avaliacoes.radioRuim_10',
     'avaliacoes.descricao', DB::raw('DATE_FORMAT(avaliacoes.datahora, \'%d/%m/%Y %H:%i:%S\') AS datahora') ,
     'avaliacoes.updated_at as avaliacoes_updated_at')
     ->orderBy('avaliacoes.descricao_profissional', 'asc')
     
     ->where($conditions)
     ->get();

     $this->arraySize = $arrayAvaliacoes;
     
     return $arrayAvaliacoes;
 }

 public function headings(): array
 {
     return  $this->export =
      [

         '           Nome            ',
         'Cpf',
         'Função',
         ' Cidade ',
         'UF',
         'Proporcionou',
         'Não Proporcionou',
         
         'Muito Bom',
         ' Bom ',
         'Regular',
         'Ruim',

         'Seguro',
         'Pouco Seguro',
         'Inseguro',

         'Excessiva',
         'Razoável',
         'Insuficiente',
         
         'Muito Bom',
         ' Bom ',
         'Regular',
         'Ruim',

         'Muito Bom',
         ' Bom ',
         'Regular',
         'Ruim',

         'Muito Bom',
         ' Bom ',
         'Regular',
         ' Ruim ',

         'Muito Bom',
         ' Bom ',
         'Regular',
         'Ruim',

         'Muito Bom',
         ' Bom ',
         'Regular',
         'Ruim',

         'Muito Bom',
         ' Bom ',
         'Regular',
         ' Ruim ',
         '              Dicas/Melhorias/Reclamações              ',
         'Data e Hora da Avaliação'
       
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

            $styleHeaders2 = [
                
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
                ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
    
            ];

                return [
            
            BeforeSheet::class => function (BeforeSheet $event) use ($styleArray, $styleTitulo, $styleSubTitulo, $styleCabecalho, $stylePerguntas){
              
                
                $cellRangeTitulo ='A1:AQ1';
                $cellRangeSubTitulo1 = 'A3:E3';
                $cellRangeSubTitulo2 = 'F3:G3';
                $cellRangeSubTitulo3 = 'G3:Q3';
                $cellRangeSubTitulo4 = 'R3:AC3';
                $cellRangeSubTitulo5 = 'AD3:AO3';
                $cellRangeSubTitulo6 = 'AP3';
                $cellRangeSubTitulo7 = 'AQ3';

                $cellRangePerguntas1 = 'A4:E4';                                
                $cellRangePerguntas2 = 'F4:G4';
                $cellRangePerguntas3 = 'H4:K4';
                $cellRangePerguntas4 = 'L4:N4';
                $cellRangePerguntas5 = 'O4:Q4';
                $cellRangePerguntas6 = 'R4:U4';
                $cellRangePerguntas7 = 'V4:Y4';
                $cellRangePerguntas8 = 'Z4:AC4';
                $cellRangePerguntas9 = 'AD4:AG4';
                $cellRangePerguntas10 = 'AH4:AK4';
                $cellRangePerguntas11 = 'AL4:AO4';
                $cellRangePerguntas12 = 'AP4';
                $cellRangePerguntas13 = 'AQ4';

             
                           
                          /****************************TITULOS***************************/

                             $event->sheet->setCellValue('A1', 'Avaliações')->mergeCells('A1:AQ1')
                                          ->getStyle($cellRangeTitulo)->applyFromArray($styleTitulo);
                                          
                             
                            /****************************SUB TITULOS***************************/
                             
                            $event->sheet->setCellValue('A3', 'Dados Pessoais')->mergeCells('A3:E3')
                                          ->getStyle($cellRangeSubTitulo1)->applyFromArray($styleSubTitulo);
                            $event->sheet->mergeCells('F3:G3')->setCellValue('F3', 'Conteudo Teórico')
                                          ->getStyle($cellRangeSubTitulo2)->applyFromArray($styleSubTitulo);
                            $event->sheet->mergeCells('H3:Q3')->setCellValue('H3', 'Conteudo Prático')
                                         ->getStyle($cellRangeSubTitulo3)->applyFromArray($styleSubTitulo);
                            $event->sheet->mergeCells('R3:AC3')->setCellValue('R3', 'Instrutor')
                                         ->getStyle($cellRangeSubTitulo4)->applyFromArray($styleSubTitulo);
                            $event->sheet->mergeCells('AD3:AO3')->setCellValue('AD3', 'Equipe de Apoio')
                                         ->getStyle($cellRangeSubTitulo5)->applyFromArray($styleSubTitulo);
                            $event->sheet->setCellValue('AP3', 'Sugestões')
                                         ->getStyle($cellRangeSubTitulo6)->applyFromArray($styleSubTitulo);
                            $event->sheet->setCellValue('AQ3', 'Data/Hora')
                                         ->getStyle($cellRangeSubTitulo7)->applyFromArray($styleSubTitulo);

                            /****************************PERGUNTAS***************************/

                             $event->sheet->mergeCells('A4:E4')->setCellValue('A4', 'Profissional')
                               ->getStyle($cellRangePerguntas1)->applyFromArray($stylePerguntas);

                             $event->sheet->mergeCells('F4:G4')->setCellValue('F4', 'Proporcionou novos conhecimentos?')
                               ->getStyle($cellRangePerguntas2)->applyFromArray($stylePerguntas);

                               $event->sheet->mergeCells('H4:K4')->setCellValue('H4', 'Clareza/facilidade de trabalho')
                               ->getStyle($cellRangePerguntas3)->applyFromArray($stylePerguntas);

                               $event->sheet->mergeCells('L4:N4')->setCellValue('L4', 'Aplicação do processo de trabalho')
                               ->getStyle($cellRangePerguntas4)->applyFromArray($stylePerguntas);

                               $event->sheet->mergeCells('O4:Q4')->setCellValue('O4', 'Carga Horária')
                               ->getStyle($cellRangePerguntas5)->applyFromArray($stylePerguntas);

                               $event->sheet->mergeCells('R4:U4')->setCellValue('R4', 'Conhecimento do Conteúdo')
                               ->getStyle($cellRangePerguntas6)->applyFromArray($stylePerguntas);
                               
                               $event->sheet->mergeCells('V4:Y4')->setCellValue('V4', 'Clareza na Exposição')
                               ->getStyle($cellRangePerguntas7)->applyFromArray($stylePerguntas);
                               
                               $event->sheet->mergeCells('Z4:AC4')->setCellValue('Z4', 'Disponibilidade para Esclarecer Dúvidas')
                               ->getStyle($cellRangePerguntas8)->applyFromArray($stylePerguntas);
                              
                               $event->sheet->mergeCells('AD4:AG4')->setCellValue('AD4', 'Conhecimento do Conteúdo')
                               ->getStyle($cellRangePerguntas9)->applyFromArray($stylePerguntas);
                               
                               $event->sheet->mergeCells('AH4:AK4')->setCellValue('AH4', 'Clareza na Exposição')
                               ->getStyle($cellRangePerguntas10)->applyFromArray($stylePerguntas);
                               
                               $event->sheet->mergeCells('AL4:AO4')->setCellValue('AL4', 'Disponibilidade para Esclarecer Dúvidas')
                               ->getStyle($cellRangePerguntas11)->applyFromArray($stylePerguntas);

                               $event->sheet->setCellValue('AP4', '#')
                               ->getStyle($cellRangePerguntas12)->applyFromArray($stylePerguntas);

                               $event->sheet->setCellValue('AQ4', '#')
                               ->getStyle($cellRangePerguntas13)->applyFromArray($stylePerguntas);
                                
                             
                               

                },



            AfterSheet::class => function(AfterSheet $event) use ($stylePerguntas, $styleHeaders2) {
              
                $cellRangeHeardes1 = 'A5:E5'; 
                $cellRangeHeardes2 = 'F5:G5';
                $cellRangeHeardes3 = 'H5:K5'; 
                $cellRangeHeardes4 = 'L5:N5'; 
                $cellRangeHeardes5 = 'O5:Q5'; 
                $cellRangeHeardes6 = 'R5:U5'; 
                $cellRangeHeardes7 = 'V5:Y5'; 
                $cellRangeHeardes8 = 'Z5:AC5'; 
                $cellRangeHeardes9 = 'AD5:AG5'; 
                $cellRangeHeardes10 = 'AH5:AK5'; 
                $cellRangeHeardes11 = 'AL5:AO5';
                $cellRangeHeardes12 = 'AP5';
                $cellRangeHeardes13 = 'AQ5';


              $event->sheet->getStyle($cellRangeHeardes1)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes2)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes3)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes4)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes5)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes6)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes7)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes8)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes9)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes10)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes11)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes12)->applyFromArray($stylePerguntas);
              $event->sheet->getStyle($cellRangeHeardes13)->applyFromArray($stylePerguntas);


              
  
            /****CALCULAR CELULAS ONDE OS TOTAIS e PORCENTAGENS DEVEM FICAR****/

               $totalPorc = count($this->arraySize);
               $inicioResults = 7;
               $size = (6 + count($this->arraySize));
               $columnTotal = ($inicioResults + count($this->arraySize));
               $columnPorcentagem = $columnTotal + 1;
               
              
               $event->sheet->mergeCells('D'.$columnTotal.':E'.$columnTotal)->setCellValue('D'.$columnTotal, ' Totais-> ')
               ->getStyle('D'.$columnTotal.':E'.$columnTotal)->applyFromArray($stylePerguntas);

               $event->sheet->mergeCells('D'.$columnPorcentagem.':E'.$columnPorcentagem)->setCellValue('D'.$columnPorcentagem, ' Porcentagens=> ')
               ->getStyle('D'.$columnPorcentagem.':E'.$columnPorcentagem)->applyFromArray($stylePerguntas);

            /********************ESTILO TOTAIS/PORCENTAGEM********************/
               
               $event->sheet->getStyle('F'.$columnTotal.':G'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('H'.$columnTotal.':K'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('L'.$columnTotal.':N'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('O'.$columnTotal.':Q'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('R'.$columnTotal.':U'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('V'.$columnTotal.':Y'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('Z'.$columnTotal.':AC'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AD'.$columnTotal.':AG'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AH'.$columnTotal.':AK'.$columnTotal)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AL'.$columnTotal.':AO'.$columnTotal)->applyFromArray($stylePerguntas);
                 
               $event->sheet->getStyle('F'.$columnPorcentagem.':G'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('H'.$columnPorcentagem.':K'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('L'.$columnPorcentagem.':N'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('O'.$columnPorcentagem.':Q'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('R'.$columnPorcentagem.':U'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('V'.$columnPorcentagem.':Y'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('Z'.$columnPorcentagem.':AC'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AD'.$columnPorcentagem.':AG'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AH'.$columnPorcentagem.':AK'.$columnPorcentagem)->applyFromArray($stylePerguntas);
               $event->sheet->getStyle('AL'.$columnPorcentagem.':AO'.$columnPorcentagem)->applyFromArray($stylePerguntas);
             
            /****************************PRINTAR OS TOTAIS****************************/
              
              $letter_1 = range("F","Z");
              $A = "A";
              $letter_2 = range("A","O");
              
              foreach($letter_1 as $letra){
               $event->sheet->setCellValue($letra.$columnTotal, '=SUM('.$letra.'6:'.$letra.''.$size.')');
  
               foreach($letter_2 as $letra2){
                    $event->sheet->setCellValue($A.$letra2.$columnTotal, '=SUM('.$A.$letra2.'6:'.$A.$letra2.''.$size.')');
                }  
              }   
            /****************************PRINTAR AS PORCENTAGENS****************************/
            
             $sim_1 = 0; $nao_1 = 0; $muito_2 = 0; $bom_2 = 0; $regular_2 = 0;
             $ruim_2 = 0; $Seguro_3 = 0; $poucoSeguro_3 = 0; $inseguro_3 = 0;
             $excessiva_4 = 0; $razoavel_4 = 0; $insuficiente_4 = 0;
             $muito_5 = 0; $bom_5 = 0; $regular_5 = 0; $ruim_5 = 0;
             $muito_6 = 0; $bom_6 = 0; $regular_6 = 0; $ruim_6 = 0;
             $muito_7 = 0; $bom_7 = 0; $regular_7 = 0; $ruim_7 = 0;
             $muito_8 = 0; $bom_8 = 0; $regular_8 = 0; $ruim_8 = 0;
             $muito_9 = 0; $bom_9 = 0; $regular_9 = 0; $ruim_9 = 0;
             $muito_10 = 0; $bom_10 = 0; $regular_10 = 0; $ruim_10 = 0;
             
    
             foreach($this->arraySize as $avaliacao){

                $sim_1 += $avaliacao->radioSim_1;
                $nao_1 += $avaliacao->radioNao_1;
                
                $muito_2 += $avaliacao->radioMuito_2;
                $bom_2+= $avaliacao->radiobom_2;
                $regular_2 += $avaliacao->radioRegular_2;
                $ruim_2 += $avaliacao->radioRuim_2;

                $Seguro_3 += $avaliacao->radioSeguro_3;
                $poucoSeguro_3 += $avaliacao->radioPoucoSeguro_3;
                $inseguro_3 += $avaliacao->radioInseguro_3;

                $excessiva_4 += $avaliacao->radioExcessiva_4;
                $razoavel_4  += $avaliacao->radioRazoavel_4;
                $insuficiente_4  += $avaliacao->radioInsuficiente_4;

                $muito_5 += $avaliacao->radioMuito_5;
                $bom_5 += $avaliacao->radiobom_5;
                $regular_5 += $avaliacao->radioRegular_5;
                $ruim_5 += $avaliacao->radioRuim_5;
                
                $muito_6 += $avaliacao->radioMuito_6;
                $bom_6 += $avaliacao->radiobom_6;
                $regular_6 += $avaliacao->radioRegular_6;
                $ruim_6 += $avaliacao->radioRuim_6;
                
                $muito_7 += $avaliacao->radioMuito_7;
                $bom_7 += $avaliacao->radiobom_7;
                $regular_7 += $avaliacao->radioRegular_7;
                $ruim_7 += $avaliacao->radioRuim_7;
                
                $muito_8 += $avaliacao->radioMuito_8;
                $bom_8 += $avaliacao->radiobom_8;
                $regular_8 += $avaliacao->radioRegular_8;
                $ruim_8 += $avaliacao->radioRuim_8;
                
                $muito_9 += $avaliacao->radioMuito_9;
                $bom_9 += $avaliacao->radiobom_9;
                $regular_9 += $avaliacao->radioRegular_9;
                $ruim_9 += $avaliacao->radioRuim_9;

                $muito_10 += $avaliacao->radioMuito_10;
                $bom_10 += $avaliacao->radiobom_10;
                $regular_10 += $avaliacao->radioRegular_10;
                $ruim_10 += $avaliacao->radioRuim_10;
              
             }

            $event->sheet->setCellValue('F'.$columnPorcentagem, formatPorcentagem($sim_1, $totalPorc));
            $event->sheet->setCellValue('G'.$columnPorcentagem, formatPorcentagem($nao_1, $totalPorc));
            $event->sheet->setCellValue('H'.$columnPorcentagem, formatPorcentagem($muito_2, $totalPorc));
            $event->sheet->setCellValue('I'.$columnPorcentagem, formatPorcentagem($bom_2, $totalPorc));
            $event->sheet->setCellValue('J'.$columnPorcentagem, formatPorcentagem($sim_1, $totalPorc));
            $event->sheet->setCellValue('G'.$columnPorcentagem, formatPorcentagem($nao_1, $totalPorc));
            $event->sheet->setCellValue('H'.$columnPorcentagem, formatPorcentagem($muito_2, $totalPorc));
            $event->sheet->setCellValue('I'.$columnPorcentagem, formatPorcentagem($bom_2, $totalPorc));
            $event->sheet->setCellValue('J'.$columnPorcentagem, formatPorcentagem($regular_2, $totalPorc));
            $event->sheet->setCellValue('K'.$columnPorcentagem, formatPorcentagem($ruim_2, $totalPorc));
            $event->sheet->setCellValue('L'.$columnPorcentagem, formatPorcentagem($Seguro_3, $totalPorc));
            $event->sheet->setCellValue('M'.$columnPorcentagem, formatPorcentagem($poucoSeguro_3 , $totalPorc));
            $event->sheet->setCellValue('N'.$columnPorcentagem, formatPorcentagem($inseguro_3, $totalPorc));
            $event->sheet->setCellValue('O'.$columnPorcentagem, formatPorcentagem($excessiva_4, $totalPorc));
            $event->sheet->setCellValue('P'.$columnPorcentagem, formatPorcentagem($razoavel_4   , $totalPorc));
            $event->sheet->setCellValue('Q'.$columnPorcentagem, formatPorcentagem($insuficiente_4, $totalPorc));
            $event->sheet->setCellValue('R'.$columnPorcentagem, formatPorcentagem($muito_5, $totalPorc));
            $event->sheet->setCellValue('S'.$columnPorcentagem, formatPorcentagem($bom_5, $totalPorc));
            $event->sheet->setCellValue('T'.$columnPorcentagem, formatPorcentagem($regular_5   , $totalPorc));
            $event->sheet->setCellValue('U'.$columnPorcentagem, formatPorcentagem($ruim_5, $totalPorc));
            $event->sheet->setCellValue('V'.$columnPorcentagem, formatPorcentagem($muito_6, $totalPorc));
            $event->sheet->setCellValue('W'.$columnPorcentagem, formatPorcentagem($bom_6, $totalPorc));
            $event->sheet->setCellValue('X'.$columnPorcentagem, formatPorcentagem($regular_6   , $totalPorc));
            $event->sheet->setCellValue('Y'.$columnPorcentagem, formatPorcentagem($ruim_6, $totalPorc));
            $event->sheet->setCellValue('Z'.$columnPorcentagem, formatPorcentagem($muito_7, $totalPorc));
            $event->sheet->setCellValue('AA'.$columnPorcentagem, formatPorcentagem($bom_7, $totalPorc));
            $event->sheet->setCellValue('AB'.$columnPorcentagem, formatPorcentagem($regular_7   , $totalPorc));
            $event->sheet->setCellValue('AC'.$columnPorcentagem, formatPorcentagem($ruim_7, $totalPorc));
            $event->sheet->setCellValue('AD'.$columnPorcentagem, formatPorcentagem($muito_8, $totalPorc));
            $event->sheet->setCellValue('AE'.$columnPorcentagem, formatPorcentagem($bom_8, $totalPorc));
            $event->sheet->setCellValue('AF'.$columnPorcentagem, formatPorcentagem($regular_8   , $totalPorc));
            $event->sheet->setCellValue('AG'.$columnPorcentagem, formatPorcentagem($ruim_8, $totalPorc));
            $event->sheet->setCellValue('AH'.$columnPorcentagem, formatPorcentagem($muito_9, $totalPorc));
            $event->sheet->setCellValue('AI'.$columnPorcentagem, formatPorcentagem($bom_9, $totalPorc));
            $event->sheet->setCellValue('AJ'.$columnPorcentagem, formatPorcentagem($regular_9   , $totalPorc));
            $event->sheet->setCellValue('AK'.$columnPorcentagem, formatPorcentagem($ruim_9, $totalPorc));
            $event->sheet->setCellValue('AL'.$columnPorcentagem, formatPorcentagem($muito_10, $totalPorc));
            $event->sheet->setCellValue('AM'.$columnPorcentagem, formatPorcentagem($bom_10, $totalPorc));
            $event->sheet->setCellValue('AN'.$columnPorcentagem, formatPorcentagem($regular_10   , $totalPorc));
            $event->sheet->setCellValue('AO'.$columnPorcentagem, formatPorcentagem($ruim_10, $totalPorc));
          

        },
        ];

       
    }
    
}


 function formatPorcentagem($valor = 0, $total = 0){
            
    $cem = 100;
    $porc = 0;
    if($total > 0){
    $porc = ($valor *  $cem )/ $total;
    $porc =  number_format($porc, 2) .'%';

    }
    return $porc;

}


