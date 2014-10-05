<?php

class DefaultController extends Controller
{

	public function actionIndex()
	{
		$this->redirect(Yii::app()->createUrl('admin/Dashboard'));
		//$this->render('index');
	}

	public function actionContoh_array()
	{
		$definisi = "array adalah variable khusus yang bisa menampung banyak nilai dalam satu waktu";

		echo $definisi."<br>";

		$data = array(
			'a'=>1,
			'b'=>2,
			'c'=>3,
			'd'=>4			
			);

		foreach($data as $d){
			echo "<br>mencetak angka dengan nilai ".$d."<br>";
		}

		// $this->render('index');
	}
	public function actionLuas_bidang()
	{
		$nilai = array(
			'tp1'=>5,
			'tp2'=>40,
			'lp2'=>60,
			'lp1'=>25,
			'ts'=>15,
			'as'=>10,
			'pi'=>3.14,
			'r'=>20
			);
		$luas = array(
			'lp1'=>$nilai['tp1']*$nilai['lp1'],
			'lp2'=>$nilai['tp2']*$nilai['lp2'],
			'ls'=>$nilai['as']*$nilai['ts']/2,
			'll'=>$nilai['pi']*$nilai['r']*$nilai['r']/2
			); 

		$luaskeseluruhan = $luas['lp1'] + $luas['lp2'] + $luas['ls'] + $luas['ll'] ;

		echo "Luas Persegi Panjang 1 = ".$luas['lp1']." m<br>";
		echo "Luas Persegi Panjang 2 = ".$luas['lp2']." m<br>";
		echo "Luas Segitiga = ".$luas['ls']." m<br>";
		echo "Luas Lingkaran = ".$luas['ll']." m<br><br>";
		echo "Luas Keseluruhan = ".$luaskeseluruhan." m<br>";
	}
}