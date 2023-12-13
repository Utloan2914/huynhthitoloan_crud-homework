<?php
/**
 * Connect to the database
 */
$host     = 'localhost'; 
$database = 'web_a'; 
$user     = 'root'; 
$password = ''; 

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

/**
 * Get the database connection
 */
function db() {
    global $db;
    return $db;
}

/**
 * Create a new student record
 */
function createStudent($values) {
    $db = db();

    $sql = "INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $values['name']);
    $stmt->bindParam(':age', $values['age']);
    $stmt->bindParam(':email', $values['email']);
    $stmt->bindParam(':profile', $values['profile']);

    $stmt->execute();
}

/**
 * Get all data from the student table
 */
function selectAllStudents() {
    $db = db();

    $sql = "SELECT * FROM student";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Các hàm khác cũng cần được sửa lại tương tự

/**
 * Get only one record by id 
 */
function selectOneStudent($id) {
    $db = db();

    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db = db();

    $sql = "DELETE FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

/**
 * Update student
 */
function updateStudent($values) {
    $db = db();

    $sql = "UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id', $values['id']);
    $stmt->bindParam(':name', $values['name']);
    $stmt->bindParam(':age', $values['age']);
    $stmt->bindParam(':email', $values['email']);
    $stmt->bindParam(':profile', $values['profile']);

    $stmt->execute();
}
?>
