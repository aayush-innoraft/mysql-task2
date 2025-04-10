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
     public function querry2()
     {
        if (isset($_POST["secondquerry"])) {
            $sql = "SELECT * FROM employee_details_table WHERE graduation_percentile > 70";
            $result = $this->conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $this->result = "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $this->result .= "<li>" . htmlspecialchars($row["employee_first_name"]) . " = " . htmlspecialchars($row["graduation_percentile"]) . "</li>";
                }
                $this->result .= "</ul>";
            } else {
                $this->result = "No employees found with graduation percentile > 70.";
            }
        }
     }

     public function querry3(){
        if (isset($_POST["thirdquerry"])){
            $sql = "SELECT a.employee_code_name, c.employee_first_name, c.graduation_percentile 
            FROM employee_code_table AS a 
            INNER JOIN employee_salary_table AS b ON a.employee_code = b.employee_code 
            INNER JOIN employee_details_table AS c ON c.employee_id = b.employee_id 
            WHERE c.graduation_percentile < 70";
    
            $result = $this->conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $this->result = "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $this->result .= "<li>" . htmlspecialchars($row["employee_first_name"]) . " = " . htmlspecialchars($row["graduation_percentile"]) . "</li>";
                }
                $this->result .= "</ul>";
            } else {
                $this->result = "No employees found with graduation percentile > 70.";
            }
        }
        }

        public function querry4(){
            
        }
    }

$querry = new Query();


$querry->querry1();

$querry->querry2();
$querry->querry3();
