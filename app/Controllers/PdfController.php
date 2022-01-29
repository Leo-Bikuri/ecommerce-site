<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class PdfController extends Controller
{

    public function index() 
	{
        return view('pdf_view');
    }

    function htmlToPDF(){
        $cart = $cart = \Config\Services::cart();
        $data['orders'] = $cart->contents();
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('Client/pdf', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        $cart->destroy();
        session()->remove('items');
    }

}