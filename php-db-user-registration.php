 <?php
/*
ANSAL  MUHAMMED
31 MARCH 2023
WEBD2201
*/
// This Defines variables for page content
$file = "lab7.php";
$date = "31-03-2023";
$title = "Rog's WEB2023 Lab 7";
$description = "For Web2023, this is the lab 7 page, which gives an introduction to databases";
$banner = "Lab 7: INTRODUCTION TO DATABASES";

// Include header file
include("./header.php");

?>
<?php
  $nameErr = $emailErr = $passwordErr = $idErr = $last_nameErr = "";
  $name = $email = $password = $id = $last_name = "";

  // Connect to database
  $host = "localhost";
  $user = "Ansal Muhammed";
  $pass = "100881383";
  $dbname = "ansala_db";
  $conn = pg_connect("host=127.0.0.1 dbname=ansala_db user=ansala password=100881383");
  if (!$conn) {
    die("Connection failed: " . pg_last_error());
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the user's data

    // Validate name
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        $name = "";
      }
    }

    // Validate email
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $email = "";
      }
    }

    // Validate password
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = test_input($_POST["password"]);
      if (strlen($password) < 8) {
        $passwordErr = "Password must be at least 8 characters long";
        $password = "";
      }
    }

    // Validate id
    if (empty($_POST["id"])) {
      $idErr = "ID is required";
    } else {
      $id = test_input($_POST["id"]);
      if (!preg_match("/^[0-9]*$/",$id)) {
        $idErr = "Only numbers allowed";
        $id = "";
      }
    }

    // Validate last name
    if (empty($_POST["last_name"])) {
      $last_nameErr = "Last name is required";
    } else {
      $last_name = test_input($_POST["last_name"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
        $last_nameErr = "Only letters and white space allowed";
        $last_name = "";
      }
    }

    // Insert the data into the database
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($idErr) && empty($last_nameErr)) {
      $query = "INSERT INTO usersdata (first_name, email, password, login_id, last_name) VALUES ('$1', '$2', '$3', '$4', '$5')";
	  $params = array($name, $email, $password, $id, $last_name);
	  $result = pg_query_params($conn, $query, $params);


      if (!$result) {
        die("Error: " . pg_last_error());
      } else {
        echo "Registration successful!";
      }
    }
  }

  // Close the database connection
  pg_close($conn);

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
	<h1>Registration Page</h1>
	<p>Please fill in your details</p>
	<form method="post" action="lab9.php">
		ID: <input type="text" name="id" value="<?php echo $id;?>">
		<span class="error"><?php echo $idErr;?></span>
		<br><br>
		First Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error"><?php echo $nameErr;?></span>
		<br><br>
		Last Name: <input type="text" name="last_name" value="<?php echo $last_name;?>">
		<span class="error"><?php echo $last_nameErr;?></span>
		<br><br>
		Email: <input type="text" name="email" value="<?php echo $email;?>">
		<span class="error"><?php echo $emailErr;?></span>
		<br><br>
		Password: <input type="password" name="password" value="<?php echo $password;?>">
		<span class="error"><?php echo $passwordErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>

