<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use PHPExcel; 
use PHPExcel_IOFactory;
use Validator;
use Session;
use App\hinhanhch;
use App\hinhanhda;
use App\dapan;
use App\cauhoi;
use App\dethi;
use App\monhoc;


class HomeController extends Controller
{
// Xuất đề thi
  public function xuatde(Request $rq) 
  {
    
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $phpWord2 = new \PhpOffice\PhpWord\PhpWord();
      $section = $phpWord->addSection();
      $section2 = $phpWord2->addSection();
      $a=$rq->input('made');
      $idde = $rq->input('idde');
      $datas = new cauhoi();
      $datas = $datas->get_ByidDe($idde); 
      $thoigian = new dethi();
      $thoigian = $thoigian->pluck_ByidDe($idde);
      $mon = new monhoc();
      $mon = $mon->pluck_ByidDe($idde);
      $table = $section->addTable();
      $styleCell = array();
      $texttd = array('name'=>'Times new roman', 'size' => 14, 'bold'=>True);
      $text = array('name'=>'Times new roman', 'size' => 13);
      $textch = array('name'=>'Times new roman', 'size' => 13, 'bold'=>True);
      $text1 = array('name'=>'Times new roman', 'size' => 13,'italic'=>True);
      $table->addRow();
      $table->addCell(5000,$styleCell)->addText('TRƯỜNG ĐẠI HỌC CẦN THƠ',$texttd,array('align' => 'center'));
      $table->addCell(5000,$styleCell)->addText('ĐỀ THI HỌC PHẦN: '.$mon[0],$texttd);
      $table->addRow();
      $table->addCell(5000,$styleCell)->addText('KHOA',$texttd,array('align' => 'center'));
      $table->addCell(5000,$styleCell)->addText('Thời gian làm bài: '.$thoigian[0].' phút',$texttd);
      $table->addRow();
      $table->addCell(5000,$styleCell)->addText('CÔNG NGHỆ THÔNG TIN VÀ TT',$texttd,array('align' => 'center'));
      $table->addCell(5000,$styleCell)->addText('');
      $table->addRow();
      $table->addCell(5000,$styleCell)->addText('');
      $table->addCell(5000,$styleCell)->addText('');
      $table->addRow();
      $table->addCell(6000,$styleCell)->addText('Họ và tên:.................................................................',$text);
      $table->addCell(4000,$styleCell)->addText('Mã số sinh viên:............................',$text);
      $table2 = $section->addTable();
      $table2->addRow();
      $table2->addCell(10000,$styleCell)->addText('(Sinh viên không được sử dụng tài liệu)',$text1,array('align' => 'center' ));
      $section->addText('');
      $i=1;
      foreach ($datas as $data)
      {
        $hinhanhch = new hinhanhch();
        $hinhanhch = $hinhanhch->get_hinhanhch($data->IDCauHoi);

        $question="Câu $i: ".htmlspecialchars($data->CHNoiDung);
        $section->addText($question,$textch);
        if($hinhanhch)
        {
          foreach ($hinhanhch as $key => $hinhanh) 
          {
            $section->addImage($hinhanh->Vitri,
              array
              (
                    'width'         => 200,
                    'height'        => 'auto',
              )
            );            
          }
        }
        $anwsers = new dapan();
        $anwsers = $anwsers->get_ByidCH($data->IDCauHoi);

        $index = array('A','B','C','D','E','F','G' );
        $j=0;
        foreach ($anwsers as $anwser) 
        {
          $hinhanhda = new hinhanhda();
          $hinhanhda = $hinhanhda->get_hinhanhda($anwser->IDDapAn);

          $as = "$index[$j]. ".htmlspecialchars($anwser->NoiDung);
          $section->addText($as,$text);
          if($hinhanhda)
          {
            foreach ($hinhanhda as $key => $hinhanh) 
            {
              $section->addImage($hinhanh->Vitri,
                array
                (
                      'width'         => 200,
                      'height'        => 'auto',
                )
              );            
            }
          }
          if($anwser->TrangThai=='1')
          {
            $da = "Câu $i: ".$index[$j];
            $section2->addText($da,$text);
          }
          $j++;
        }
        $i++;
      }
      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
      $objWriter2 = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord2, 'Word2007');    
      if(!file_exists('D:\Dethi-'.$idde))
      {
        mkdir('D:\Dethi-'.$idde);
      }
      if(!file_exists('D:\Dethi-'.$idde.'\\'.$a))
      {
        mkdir('D:\Dethi-'.$idde.'\\'.$a);
      }
      else
      {
        Session::flash('error','Mã đề đã tồn tại!');
        return redirect()->back();
      }
      $objWriter->save('D:\Dethi-'.$idde.'\\'.$a.'\helloWorld-'.$a.'.docx');
      $objWriter2->save('D:\Dethi-'.$idde.'\\'.$a.'\dapan-'.$a.'.docx');
      Session::flash('success','Xuất đề thi thành công! Xem đề tại thư mục: D:\Dethi-'.$idde.'\\'.$a);
      return redirect()->back();
    
  }
}
    