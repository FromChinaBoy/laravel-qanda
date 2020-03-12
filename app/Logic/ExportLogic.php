<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 12/3/2020
 * Time: 3:43 PM
 */

namespace App\Logic;

class ExportLogic
{
    /**
     * 导出
     * @author: zzhpeng
     * Date: 12/3/2020
     * @param $data
     * @param $filename
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public static function investigation($data,$filename){
        if (empty($data)) {
            throw new \Exception('导出数据为空');
        }

        $titleNameArr = array_column($data['questions'],'name');

        $title = [
            array_merge(['用户编号','提交时间'],$titleNameArr)
        ];

        $arrData = [];
        foreach ($data['answers'] as $answers) {
            $arrData[] = array_merge([
                (empty($answers['user_id'])?'-':$answers['user_id']) . '(' . $answers['ip'] . ')',
                $answers['create_time']
            ],array_column($answers['details'],'content'));
        }


        $arrData = array_merge($title, $arrData);
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        // 表格设置
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14
            ]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $spreadsheet->getActiveSheet()->fromArray($arrData);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器输出07Excel文件
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');//告诉浏览器输出浏览器名称
        header('Cache-Control: max-age=0');//禁止缓存
        $writer->save('php://output');
        exit(0);
    }
}