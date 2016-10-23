<?php
final class Loader {
	private $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}
	public function model($model) {
		$file = APP_FOLDER.'model/' . $model . '.php';
		$class = APP.'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $model);

		if (file_exists($file)) {
			include_once($file);

			$this->registry->set('model_' . str_replace('/', '_', $model), new $class($this->registry));
		} else {
			trigger_error('Error: Could not load model ' . $file . '!');
			exit();
		}
	}

	public function library($library) {
		$file = DIR_SYSTEM . 'lib/' . $library . '.php';

		if (file_exists($file)) {
			include_once($file);
		} else {
			trigger_error('Error: Could not load library ' . $file . '!');
			exit();
		}
	}

}