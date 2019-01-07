<!-- api.php -->

<?

// google books api model
class apiModel
{

    function __construct($parent)
    {
        $this->db = $parent->db;

    }

    // google books
    public function googleBooks($term='')  {

        // include dependencies
        require_once './google-api-php-client-2.2.2/vendor/autoload.php';

        $client = new Google_Client();
        $client->setApplicationName("sslapi");
        $client->setDeveloperKey("AIzaSyCxfSLm4QIo7TC7RMMpSBQgzzS0gKI77sU");

        $service = new Google_Service_Books($client);
        $optParams = array('filter' => 'free-ebooks');

        if ($term === '') {
            $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
        }
        else {
            $results = $service->volumes->listVolumes($term, $optParams);
        }

        return $results;
    }




}


?>
