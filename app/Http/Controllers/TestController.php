<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinhTP;
use App\QuanHuyen;
use App\PhuongXa;
use App\Diadiem;

class TestController extends Controller
{
    public function index()
    {
        $dd=Diadiem::all();
        return view('test',compact('dd'));
    }
    public function insert()
    {
        $dd= new Diadiem();
        $dd->tinh="An Giang";
        $xa1 = new PhuongXa();
        $xa1->ten = "Xã 1";
        $xa2 = new PhuongXa();
        $xa2->ten = "Xã 2";

        $huyen1 = new QuanHuyen();
        $huyen1->ten = "Huyện 1";
        $huyen1->xa=array($xa1,$xa2);
        $huyen2 = new QuanHuyen();
        $huyen2->ten = "Huyện 2";

        $dd->huyen=array($huyen1, $huyen2);
        $dd->save();

        dd($dd);
    }
    public function updatehuyen($tinh)
    {
        $tenhuyen = "Cờ Đỏ";
        $tenmoi = "Thới Lai";
        $search = Diadiem::where('tinh','Cần Thơ');
    	$diadiem = $search->get();
        foreach ($diadiem as $dd) {
            $huyen = $dd->huyen;
            $num = sizeof($huyen);
            if($num >0){
                for ($i=0; $i < $num ; $i++) { 
                    if($huyen[$i]['ten'] == $tenhuyen){
                        echo "Đã tìm thấy tên: ".$tenhuyen;
                        $search->update(array('huyen.'.$i.'.ten' => $tenmoi));
                        echo "<br>Đã cập nhật tên thành: ".$tenmoi;
                    } 
                }
            }else{
                echo "Tỉnh này hiện tại chưa có huyện";
            }
        }
    }
    public function themhuyen($tinh)
    {
        $tenhuyen = "Phong Điền";
        $tenmoi = "Thới Lai";
        $search = Diadiem::where('tinh','Cần Thơ');
        $diadiem = $search->get();
        foreach ($diadiem as $dd) {
            $huyen = $dd->huyen;
            $num = sizeof($huyen);
            echo "Số huyện hiện tại: ".$num;
            $search->update(array('huyen.'.$num.'.ten' => $tenhuyen));
            echo "<br>Đã thêm huyện tên : ".$tenhuyen;

            
        }
    }
    public function updatexa($tinh)
    {
        $tenxa = "Xã 2";
        $tenmoi = "An Khánh";
        $search = Diadiem::where('_id',$tinh);
        $diadiem = $search->get();
        foreach ($diadiem as $dd) {
            $huyen = $dd->huyen;
            $num = sizeof($huyen);
            if($num > 0){
                for ($i=0; $i < $num ; $i++) { 
                    echo $i."---";
                    if(!isset($huyen[$i]['xa']) ){
                        echo "Huyện ".$huyen[$i]['ten']." hiện tại chưa có xã<br>";
                    }else{
                        $xa = $huyen[$i]['xa'];                         
                        $num2 = sizeof($xa);
                        echo "Huyện ".$huyen[$i]['ten']." có ".$num2." xã<br>";
                        for ($j=0; $j < $num2 ; $j++) { 
                            echo $xa[$j]['ten']."---";
                            if($xa[$j]['ten'] == $tenxa){
                                echo "Đã tìm thấy tên: ".$tenxa;
                                $search->update(array('huyen.'.$i.'.xa.'.$j.'.ten' => $tenmoi));
                                echo "<br>Đã cập nhật tên thành: ".$tenmoi;
                            }
                        }
                        echo "<br>";

                    }

                }
            }else{
                echo "Tỉnh này hiện tại chưa có huyện";
            }
            
        }
    }
    public function themxa($tinh)
    {
        $tenxa = "Xã 2";
        $tenmoi = "An Phú";
        $tenhuyen = "Ninh Kiều";
        $search = Diadiem::where('_id',$tinh);
        $diadiem = $search->get();
        foreach ($diadiem as $dd) {
            $huyen = $dd->huyen;
            $num = sizeof($huyen);
            if($num > 0){
                for ($i=0; $i < $num ; $i++) { 
                    if($huyen[$i]['ten'] == $tenhuyen){
                        $xa = $huyen[$i]['xa'];                         
                        $num2 = sizeof($xa);
                        echo "Huyện ".$huyen[$i]['ten']." có ".$num2." xã<br>";
                        $search->update(array('huyen.'.$i.'.xa.'.$num2.'.ten' => $tenmoi));
                        echo "<br>Đã thêm xã tên : ".$tenmoi;
                            
                    }
                }

            }else{
                echo "Tỉnh này hiện tại chưa có huyện";
            }
        }
    }
    public function test()
    {

        $diadiem = Diadiem::where('_id',$tinh)->get();
        foreach ($diadiem as $dd) {
            $huyen = $dd->huyen;
            $num = sizeof($huyen);
            if($num > 0){
                for ($i=0; $i < $num ; $i++) { 
                    echo $i."---";
                    if(!isset($huyen[$i]['xa']) ){
                        echo "Huyện ".$huyen[$i]['ten']." hiện tại chưa có xã<br>";
                    }else{
                        $xa = $huyen[$i]['xa'];                         
                        $num2 = sizeof($xa);
                        echo "Huyện ".$huyen[$i]['ten']." có ".$num2." xã<br>";
                        for ($j=0; $j < $num2 ; $j++) { 
                            echo $xa[$j]['ten']."---";
                            if($xa[$j]['ten'] == $tenxa){
                                echo "Đã tìm thấy tên: ".$tenxa;
                                Diadiem::where()
                                echo "<br>Đã cập nhật tên thành: ".$tenmoi;
                            }
                        }
                        echo "<br>";

                    }

                }
            }else{
                echo "Tỉnh này hiện tại chưa có huyện";
            }
            
        }
        // $diadiem = $search->get();
        // foreach ($diadiem as $dd) {
        //     $huyen = $dd->huyen;
        //     $num = sizeof($huyen);
        //     if($num > 0){
        //         for ($i=0; $i < $num ; $i++) { 
        //             if($huyen[$i]['ten'] !== null){
        //                 if(isset($huyen[$i]['xa'])){
        //                     $xa = $huyen[$i]['xa'];                         
        //                     $num2 = sizeof($xa);
        //                     if($num2 > 0){
        //                         for ($j=0; $j < $num2 ; $j++) { 
        //                             if($xa[$j]['ten'] == null){
        //                                 for ($k=$j; $k < $num2; $k++) { 
        //                                      echo $xa[$k]['ten']; 

        //                                 }
        //                             }
        //                         }
        //                     }    
        //                 }
                                            
                            
        //             }
        //         }

        //     }else{
        //         echo "Tỉnh này hiện tại chưa có huyện";
        //     }
        // }
        // $search->delete();
        // $search = Diadiem::where('tinh',"Cần Thơ")->get();
        // $search->delete(array( 'huyen.0.ten' => 'Phong Điền'));
        //dd($search);
    }
}
