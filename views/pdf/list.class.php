<?php
class Price extends FPDF {
    function PrintTitle($title) {
        //Выводим наименование документа
        $this->SetFont('Arial','B',16);
        $this->Cell(150,20, $title);
        //Переходим на следующую строку
        $this->Ln();
    }

    function LoadData($file = 'price.csv') {
        //Получаем данные в массив строк
//        $lines=file('C:\OSPanel\domains\ItSchoolSamsungProgect\views\pdf\price.xlsx');
        $lines=file(ROOT.'\views\pdf\text.txt');
        $data=array();
        //Разделяем столбцы каждой строки по точке с запятой.
        foreach($lines as $line)
            $data[]=explode(';',chop($line));
        //Возвращаем массив с данными
        return $data;
    }

    function ImprovedTable($header,$data) {
        //Указываем ширину столбцов
        $w=array(100,40,40);

        //Выводим заголовки столбцов
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();

        //Выводим данные
        //Сначала установим шрифт для данных
        $this->SetFont('Arial','B',16);
        foreach($data as $row)
        {
            /*Первый параметр Cell() - ширина столбца, указанная ранее в массиве $w, второй параметр - высота столбца, третий параметр - строка для вывода, LRBT - означает прорисовку границ со всех сторон ячейки (Left, Right, Bottom, Top). Можно также указать выравнивание в ячейке по правому краю ('R') */

            //Рисуем ячейку наименования товара
            $this->Cell($w[0],6,$row[0],'LRBT');

            //Рисуем ячейку розничной цены
//            $this-> Cell($w[1],6, $row[1],'LRBT',0,'R');
            $this->Cell($w[1],6,$row[0],'LRBT');

            //Рисуем ячейку оптовой цены
//            $this-> Cell($w[2],6,$row[2],'LRBT',0,'R');
            $this->Cell($w[2],6,$row[0],'LRBT');

            //Переходим на следующую строку
            $this->Ln();
        }
        //Closure line
        $this->Cell(array_sum($w),0,'','T');
    }
}
?>