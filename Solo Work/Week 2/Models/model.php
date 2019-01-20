<?php
/**
 *
 */
class BaseModel
{

	function __construct()
	{
		// variables
        $user = "root";
        $password = "root";
        $dbname = "grades";
		$dsn = "mysql:host=127.0.0.1;dbname=grades;port=8889";

        // connect to the database
        try {
            $this->connection = new PDO($dsn, $user, $password);
        } catch(PDOException $error) {
        	echo "Error: " . $error->getMessage();
        }
	}

	// create a record
	public function createRecord($sql, $value=array())
	{
		// prepare statement
		$stmt = $this->connection->prepare($sql);

		// bind the params
		$stmt->bindParam(':studentname', $value['name']);
		$stmt->bindParam(':studentpercent', $value['percent']);
		$stmt->bindParam(':studentlettergrade', $value['grade']);
		$stmt->execute();
	}

	// read all records
	public function readRecords($sql)
	{
		// prepare statement
		$stmt = $this->connection->prepare($sql);
		// execute statement
		$stmt->execute();
		// fetch and return data
		$result = $stmt->fetchall();
		if ($result) {
			return $result;
		}
		else {
			return 0;
		}
	}

	// update a record
	public function updateRecord($sql, $value=array())
	{
		// prepare statement
		$stmt = $this->connection->prepare($sql);

		// bind the params
		$stmt->bindParam(':studentname', $value['name']);
		$stmt->bindParam(':studentpercent', $value['percent']);
		$stmt->bindParam(':studentlettergrade', $value['grade']);
		$stmt->execute();
	}

	// delete a record from the database
	public function deleteRecord($sql, $delete)
	{
		// prepare statement
		$stmt = $this->connection->prepare($sql);

		// bind the params
		$stmt->bindParam(':studentid', $delete);
		$stmt->execute();
	}
}

?>
