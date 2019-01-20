<?php
require_once './Views/view.php';
require_once './Models/model.php';
/**
 *
 */
class BaseController
{

	// class constructor
	public function __construct()
	{
		// include the view and model
		$this->view = new BaseView();
		$this->model = new BaseModel();

		// fetch and display all records
		$records = $this->readAction();
		$this->view->displayIndex($records);

		// if the form is submitted
		if ($_POST['submit-btn'] == "Create") {
			$this->onFormSubmit($_POST);
		}
		elseif ($_POST['submit-btn'] == "Update") {
			$update = $_POST;
			$this->updateAction($update);
		}

		// if the delete button is clicked
		if ($_GET['delete-btn']) {
			$delete = $_GET['delete-btn'];
			$this->deleteAction($delete);
		}
	}

	// on form submit
	public function onFormSubmit($values)
	{
		// store POST in variables
		$studentname = $_POST['name'];
		$studentpercent = $_POST['percent'];

		// validate input
		if (empty($studentname) || (empty($studentpercent) && $studentpercent != 0) || !is_numeric($studentpercent)) {
			// display error msg
			?>
			<p class="err-msg"><i class="fas fa-exclamation"></i>Invalud input. Please make sure all fields are filled out and 'Student Percent' is a number.</p>
			<?
		}
		// if valid, create letter grade function
		else {
			$lettergrade = $this->getletterGrade($studentpercent);
			$this->createAction($studentname, $studentpercent, $lettergrade);
		}
	}

	// get letter grade
	public function getletterGrade($percentage)
	{
		// A
		if ($percentage >= 90) {
			return "A";
		}
		// B
		elseif ($percentage >= 80) {
			return "B";
		}
		// C
		elseif ($percentage >= 70) {
			return "C";
		}
		// D
		elseif ($percentage >= 60) {
			return "D";
		}
		// F
		else {
			return "F";
		}
	}

	// add record to the database
	public function createAction($name, $percent, $grade)
	{
		// sql statement
		$sql = "INSERT INTO grades (studentname, studentpercent, studentlettergrade) VALUES(:studentname, :studentpercent, :studentlettergrade);";
		// send sql statement and variables to the model
		$this->model->createRecord($sql ,array("name"=>$name, "percent"=>$percent, "grade"=>$grade));
		// update page
		printf("<script>location.href='/'</script>");
	}

	// load all records from the database
	public function readAction()
	{
		// sql statement
		$sql = "SELECT * FROM grades order by studentid ASC;";
		// send to model to retrieve records and save to variabe
		$records = $this->model->readRecords($sql);
		return $records;
	}

	// update a record and save to the database
	public function updateAction($value)
	{
		// get id
		$studentid = $value['id'];
		if (!is_numeric($value['percent'])) {
			echo "Invalud input. Please make sure 'Student Percent' is a number.";
		}
		else {
			// update letter grade
			$lettergrade = $this->getletterGrade($value['percent']);
			$value['grade'] = $lettergrade;

			// sql statement
			$sql = "UPDATE grades SET studentname = :studentname, studentpercent = :studentpercent, studentlettergrade = :studentlettergrade WHERE studentid = $studentid;";
			// send to model to update record
			$this->model->updateRecord($sql, $value);
			// update page
			printf("<script>location.href='/'</script>");
		}
	}

	// delete record from the database
	public function deleteAction($value)
	{
		// sql statement
		$sql = "DELETE from grades where studentid IN (:studentid);";
		// send to model to delete record
		$this->model->deleteRecord($sql, $value);
		// update page
		printf("<script>location.href='/'</script>");
	}


}
