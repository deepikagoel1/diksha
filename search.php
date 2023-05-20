<?php
// Include the necessary files and establish database connection

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $searchTerm = $_GET['q'];
  $category = $_GET['category'];
  $tag = $_GET['tag'];

  // Construct the SQL query for filtering
  $sql = "SELECT * FROM courses WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";

  if (!empty($category)) {
    // Add category filter to the SQL query
  }

  if (!empty($tag)) {
    // Add tag filter to the SQL query
  }

  // Execute the SQL statement and fetch the filtered results

  // Display the filtered results
  foreach ($results as $result) {
    // Display course/lesson/content information
  }
}
?>

<!-- HTML form for search and filtering -->
<form method="GET" action="search.php">
  <input type="text" name="q" required>
  <select name="category">
    <!-- Populate category options -->
  </select>
  <select name="tag">
    <!-- Populate tag options -->
  </select>
  <input type="submit" value="Search">
</form>
