<?php
// Include the database connection file
require_once 'config.php';

// Check if the course ID is provided
if (!empty($_GET['id'])) {
    $courseId = $_GET['id'];

    // Retrieve the course details from the database
    $sql = "SELECT * FROM courses WHERE id='$courseId'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Check if the course update form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $author = $_POST['author'];

            // Update the course data in the database
            $sql = "UPDATE courses SET title='$title', description='$description', author='$author' WHERE id='$courseId'";
            if (mysqli_query($connection, $sql)) {
                // Course update successful
                header('Location: courses.php');
                exit;
            } else {
                // Error occurred during course update
                echo "Course update failed. Please try again.";
            }
        }
        ?>

        <!-- HTML form for editing the course -->
        <form method="POST" action="edit_course.php?id=<?php echo $courseId; ?>">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>

            <label>Description:</label>
            <textarea name="description" required><?php echo $row['description']; ?></textarea><br>

            <label>Author:</label>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>

            <input type="submit" value="Update Course">
        </form>
        <?php
    } else {
        echo "Course not found.";
    }
} else {
    echo "Course ID not provided.";
}
?>
