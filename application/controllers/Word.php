<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Word extends CI_Controller {

	public function index()
	{
		$phpWord = new PhpWord();
		$tgl = '8 Juli 2021';
		$nama = 'Harby Anwardi';
		$tujuan = 'Kapolsek Cikarang Barat';
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('suratlapas.docx');
		$templateProcessor->setValues([
		    'tanggal' => $tgl,
		    'nama'	  => $nama,
		    'tujuan'  => $tujuan,
		]);

		header("Content-Disposition: attachment; filename=suratlapas.docx");

		$templateProcessor->saveAs('php://output');

		// $section = $phpWord->addSection();
		// $section->setValue('Title',  "Testtitel 1", 1);
		// $section->setValue('Title',  "Testtitel 2", 1);
		// $section->setValue('Title',  "Testtitel 3", 1);
		// $section->addText('Hello World !');
		
		// $writer = new Word2007($phpWord);
		
		// $filename = 'simple';
		
		// header('Content-Type: application/msword');
  //       	header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
		// header('Cache-Control: max-age=0');
		
		// $writer->save('php://output');
	}
}