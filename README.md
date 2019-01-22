### Documentation  

#### Database file is sent to an email

* Import database
* In /inc/database.inc.php change following database connection settings:
	* servername
	* username	 
	* password
	* dbname

```
protected function connect() {
		$this->servername = "localhost";	// change if necessary
		$this->username = "root";			// change if necessary
		$this->password = "";				// change if necessary
		$this->dbname = "vendon"; 			// change if necessary

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		return $conn;
	}
```
