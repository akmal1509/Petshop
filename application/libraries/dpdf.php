<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 */

use Dompdf\Dompdf;
use Dompdf\Options;

class dPdf extends Dompdf
{
	/**
	 * PDF filename
	 * @var String
	 */
	public $filename;
	public function __construct()
	{
		parent::__construct();
		$this->filename = "laporan.pdf";
	}
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access    protected
	 * @return    void
	 */
	protected function ci()
	{
		return get_instance();
	}
	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access    public
	 * @param    string    $view The view to load
	 * @param    array    $data The view data
	 * @return    void
	 */
	public function load_view($view, $data = array())
	{
		$options = new Options();
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);
		$html = $this->ci()->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		// Render the PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		$dompdf->stream($this->filename, array("Attachment" => false));
	}
}
