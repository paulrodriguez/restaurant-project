<?php
namespace Admin;
use Country;
use State;
use View;
use Input;
use Redirect;
use Request;
use Response;
class StateController extends BaseController {
	protected $layout = "layouts.admin";
	public function index() {
		$states = State::get();
		$countries = Country::get();
		View::share("title","States");

		$this->layout->content = View::make("admin.states.index")->with('states',$states)->with("countries",$countries);
	}
	public function create() {

	}

	public function store() {
		$input = Input::all();
		$state = new State;
		$state->name = $input['name'];
		$state->code = $input['code'];
		$state->country_code = $input['country_code'];
		$state->save();
		return Redirect::to("admin/countries");
	}
}