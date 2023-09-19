<?php namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;
use Illuminate\Support\Facades\Request as IllRequest;
use Illuminate\Support\Facades\View as IllView;
use Illuminate\Support\Facades\File as IllFile;
use Illuminate\Support\Facades\Redirect as IllRedirect;
use Illuminate\Support\Facades\Response as IllResponse;
use Illuminate\Database\Eloquent\Collection;

class LogsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware ( 'auth' );
	}

	/**
	 * Show de application index
	 *
	 * @param unknown $group
	 * @param unknown $page
	 * @param string $order
	 * @param string $dir
	 * @return \Illuminate\View\View
	 */
	public function index($group, $page) {
		if (IllRequest::input('l')) {
			LaravelLogViewer::setFile(base64_decode(IllRequest::input('l')));
		}
	
		if (IllRequest::input('dl')) {
			return IllResponse::download(LaravelLogViewer::pathToLogFile(base64_decode(IllRequest::input('dl'))));
		} elseif (IllRequest::has('del')) {
			IllFile::delete(LaravelLogViewer::pathToLogFile(base64_decode(IllRequest::input('del'))));
			return IllRedirect::to(IllRequest::url());
		}
	
		$logs = LaravelLogViewer::all();
		array_walk($logs, function(&$value, &$key) {
			$value['id'] = $key + 1;
		});
		
		return IllView::make( $group . '/' . $page, [
				'group' => 'Management',
				'page' => 'Logs',
				'logs' => $logs,
				'files' => LaravelLogViewer::getFiles(true),
				'current_file' => LaravelLogViewer::getFileName()
		]);
	}
	
	/**
	 * Return list of object eloquent model for datatables
	 *
	 * @param unknown $group
	 * @param unknown $page
	 * @return Ambigous <\Illuminate\View\View, mixed>
	 */
	public function viewlist($group, $page) {
		if (IllRequest::input('l')) {
			LaravelLogViewer::setFile(base64_decode(IllRequest::input('l')));
		}		
		$logs = LaravelLogViewer::all();	
		array_walk($logs, function(&$value, &$key) {
			$value['id'] = $key + 1;
		});
		return Datatables::of(Collection::make($logs))->escapeColumns(['error'])->make();
	}
}