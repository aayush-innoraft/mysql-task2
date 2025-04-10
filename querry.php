<?php

// making a class named querry 
class Query
{

  // defining variables 
  public $conn;  // coonection variable 
  public $database = "employee";  // database name 
  public $result = ""; // store output here

  public function __construct()  // constructor 
  {
    $this->conn = mysqli_connect("localhost", "root", "aayush777", $this->database);
    if (!$this->conn) {
      die("Connection error: " . mysqli_connect_error());
    }
  }

  // querry one or task one 
  public function querry1()
  {
    // if button one is clicked only then 
    if (isset($_POST["onequerry"])) {
      $btnValue = $_POST["onequerry"];

      // frist task  querry 
      $sql = "SELECT a.employee_first_name   
                    FROM employee_details_table AS a 
                    INNER JOIN employee_salary_table AS b     
                    ON a.employee_id = b.employee_id 
                    WHERE b.employee_salary > 50";
      //result 
      $result = $this->conn->query($sql);
      //    if result does not have any rows or columns 
      if ($result && $result->num_rows > 0) {
        $this->result = "<ul>";
        // fetching result in an array
        while ($row = $result->fetch_assoc()) {
          $this->result .= "<li>" . htmlspecialchars($row["employee_first_name"]) . "</li>";
        }
        $this->result .= "</ul>";
      } else {
        // if no data found 
        $this->result = "No data found.";
      }
    }
  }

  // second task or querry two 
  public function querry2()
  {
    // if second button is clicked on then 
    if (isset($_POST["secondquerry"])) {
      // sql querry 
      $sql = "SELECT * FROM employee_details_table WHERE graduation_percentile > 70";
      // fetching results 
      $result = $this->conn->query($sql);
      // if results are genuine 
      if ($result && $result->num_rows > 0) {
        // show results 
        $this->result = "<ul>";
        while ($row = $result->fetch_assoc()) {
          $this->result .= "<li>" . htmlspecialchars($row["employee_first_name"]) . " = " . htmlspecialchars($row["graduation_percentile"]) . "</li>";
        }
        $this->result .= "</ul>";
      } else {
        // else does not fount result 
        $this->result = "No employees found with graduation percentile > 70.";
      }
    }
  }
  // function 3 for task 3 
  public function querry3()
  {
    // if third button is clicked on then 
    if (isset($_POST["thirdquerry"])) {
      // sql querry 
      $sql = "SELECT a.employee_code_name, c.employee_first_name, c.graduation_percentile 
            FROM employee_code_table AS a 
            INNER JOIN employee_salary_table AS b ON a.employee_code = b.employee_code 
            INNER JOIN employee_details_table AS c ON c.employee_id = b.employee_id 
            WHERE c.graduation_percentile < 70";
      //  storin  result  value 
      $result = $this->conn->query($sql);
      // if result is genuine 
      if ($result && $result->num_rows > 0) {
        $this->result = "<ul>";
        while ($row = $result->fetch_assoc()) {
          $this->result .= "<li>" . htmlspecialchars($row["employee_first_name"]) . " = " . htmlspecialchars($row["graduation_percentile"]) . "</li>";
        }
        // showing result 
        $this->result .= "</ul>";
      } else {
        // else no result found or table is empty 
        $this->result = "No employees found with graduation percentile > 70.";
      }
    }
  }

  // task 4 or querry 4 
  public function querry4()
  {
    // if fourth button is pressed 
    if (isset($_POST["fourthquerry"])) {
      //   sql querry 
      $sql = "SELECT CONCAT(a.employee_first_name, ' ', a.employee_last_name) AS fullname
                    FROM employee_details_table AS a
                    INNER JOIN employee_salary_table AS b ON a.employee_id = b.employee_id
                    INNER JOIN employee_code_table AS c ON c.employee_code = b.employee_code
                    WHERE c.employee_domain != 'java'";
      // extracting results 
      $result = $this->conn->query($sql);
      // if table is not empty 
      if ($result && $result->num_rows > 0) {
        $this->result = "<ul>";
        // extracting and storing result into variable named row 
        while ($row = $result->fetch_assoc()) {
          $this->result .= "<li>" . htmlspecialchars($row["fullname"]) . "</li>";
        }
        $this->result .= "</ul>";
      } else {
        // if there is error show error 
        $this->result = "No employees found outside the Java domain.";
      }
    }
  }
  // fifth task 
  public function querry5()
  {
    // if fifth button is clicked 
    if (isset($_POST["fifthquerry"])) {
      // querry 
      $sql = "SELECT b.employee_domain, SUM(a.employee_salary) AS domain_salary 
                    FROM employee_salary_table AS a 
                    INNER JOIN employee_code_table AS b 
                    ON a.employee_code = b.employee_code 
                    GROUP BY b.employee_domain";
      //    result extracting 
      $result = $this->conn->query($sql);
      // checking if rows are not empty 
      if ($result && $result->num_rows > 0) {
        $this->result = "<ul>";
        while ($row = $result->fetch_assoc()) {
          // extracting answer
          $this->result .= "<li>" .
            htmlspecialchars($row["employee_domain"]) .
            "=" .
            htmlentities($row["domain_salary"]) .
            "k" .
            "</li>";
        }
        $this->result .= "</ul>";
      } else {
        $this->result = "No salary data found for domains.";
      }
    }
  }
  // sixth querry 
  public function querry6()
  {
    // only if button is clicked 
    if (isset($_POST["sixthquerry"])) {
      // querry inserting 
      $sql = "SELECT b.employee_domain, 
                           SUM(a.employee_salary) AS domain_salary 
                    FROM employee_salary_table AS a 
                    INNER JOIN employee_code_table AS b 
                    ON a.employee_code = b.employee_code 
                    WHERE a.employee_salary > 30
                    GROUP BY b.employee_domain";
      // extracting results 
      $result = $this->conn->query($sql);
      // checking if rows are not empty 
      if ($result && $result->num_rows > 0) {
        $this->result = "<ul>";
        while ($row = $result->fetch_assoc()) {
          // extracting results 
          $this->result .= "<li>" .
            htmlspecialchars($row["employee_domain"]) .
            " = ₹" .
            htmlentities($row["domain_salary"]) .
            "</li>";
        }
        $this->result .= "</ul>";
      } else {
        $this->result = "No domain has salaries over ₹30,000.";
      }
    }
  }

  // task 7 
  public function query7()
  {
    // SQL query
    $sql = "SELECT employee_id from employee_salary_table where employee_code IS NULL";

    // Execute the query
    $result = $this->conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {

      echo "<table border='1'>";
      echo "<tr><th>Employee ID</th></tr>";

      // Fetch and display each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["employee_id"] . "</td></tr>";
      }

      echo "</table>";
    }
  }
  // destructor calling 
  public function __destruct()
  {
    // Close the MySQL connection
    $this->conn->close();
  }
}

// creating new object 
$querry = new Query();
// calling function querry1 
$querry->querry1();
// calling function querry2 
$querry->querry2();
// calling function querry3 
$querry->querry3();
// calling function queery 4 
$querry->querry4();
// calling function querry 5 
$querry->querry5();
// calling function querry 6 
$querry->querry6();
// calling function querry 7 
$querry->query7();
