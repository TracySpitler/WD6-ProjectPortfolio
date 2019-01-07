<!-- fruits.php -->

<?
// fruits db model
class fruits
{

    function __construct($parent)
    {
        $this->db = $parent->db;

    }

    // select database
    public function select($sql, $value=array())  {

        $sr = $this->db->prepare($sql);
        $sr->execute($value);
        $data = $sr->fetchAll();
        return $data;

    }

    // add
    public function add($sql, $value=array()) {

        $sr = $this->db->prepare($sql);
        $sr->execute($value);

    }

    // delete
    public function delete($sql, $value=array()) {

        $sr = $this->db->prepare($sql);
        $sr->execute($value);

    }

    // update
    public function update($sql, $value=array()) {

        $sr = $this->db->prepare($sql);
        $sr->execute($value);

    }


}


?>
