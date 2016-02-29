<?php
Class View {

	protected $_model;
	protected $_controller;

	public function __construct($model, $controller) {

		$this->_model = $model;
		$this->_controller = $controller;

	}

	protected function openRow() {

		echo "<div class='row'>";

	}

	protected function closeRow() {

		echo "</div>";

	}

	protected function printElement($element, $values, $attributes = null) {

		echo "<$element ";

		if($attributes != null) {

			foreach($attributes as $attribute => $value) {

				echo "$attribute='$value'";

			}

		}
		echo ">";

		echo "$values</$element>";		

	}

	protected function printColumn($columnSize, $element, $values, $attributes = null) {

		echo "<div class='col-xs-$columnSize col-s-$columnSize col-md-$columnSize col-l-$columnSize'>";
		$this->printElement($element, $values, $attributes);
		echo "</div>";

	}

	public function output() {

		require_once($this->_model->getTemplate());

	}

}