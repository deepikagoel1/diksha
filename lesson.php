<?php
// Include the necessary files and establish database connection
require_once 'analytics.php';

// Retrieve the user's client ID (you can generate and store it when the user logs in)
$clientId = $_SESSION['user_id']; // Replace with your logic to get the client ID

// Track the page view
trackPageView('YOUR_TRACKING_ID', $clientId, '/lesson.php?id=123'); // Replace with your Google Analytics tracking ID and the actual page path

// Rest of the code to display the lesson conte
// Retrieve the lesson or course ID from the URL or query parameters
$itemId = $_GET['id'];

// Retrieve comments associated with the lesson or course
$sql = "SELECT * FROM comments WHERE lesson_id = $itemId";
// Execute the SQL statement and fetch the comments

// Display the comments
foreach ($comments as $comment) {
  // Display comment details
}

// Process comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $commentText = $_POST['comment'];
  // Validate and sanitize the comment text

  // Insert the comment into the database
  $sql = "INSERT INTO comments (lesson_id, user_id, comment_text, created_at, updated_at) VALUES ('$itemId', '$userId', '$commentText', NOW(), NOW())";
  // Execute the SQL statement to insert the comment
}
?>

<!-- HTML form for submitting comments -->
<form method="POST" action="lesson.php?id=<?php echo $itemId; ?>">
  <textarea name="comment" required></textarea>
  <input type="submit" value="Submit Comment">
</form>
<?php
// Include the necessary files and establish database connection

// Retrieve the lesson or course ID from the URL or query parameters
$itemId = $_GET['id'];

// Retrieve ratings associated with the lesson or course
$sql = "SELECT * FROM ratings WHERE lesson_id = $itemId";
// Execute the SQL statement and fetch the ratings

// Calculate the average rating
$totalRatings = count($ratings);
$averageRating = 0;
foreach ($ratings as $rating) {
  $averageRating += $rating['rating_value'];
}
if ($totalRatings > 0) {
  $averageRating = $averageRating / $totalRatings;
}

// Display the average rating
echo "Average Rating: " . round($averageRating, 1) . "/5";

// Process rating submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ratingValue = $_POST['rating'];
  // Validate and sanitize the rating value

  // Insert the rating into the database
  $sql = "INSERT INTO ratings (lesson_id, user_id, rating_value, created_at, updated_at) VALUES ('$itemId', '$userId', '$ratingValue', NOW(), NOW())";
  // Execute the SQL statement to insert the rating
}
?>

<!-- HTML form for submitting ratings -->
<form method="POST" action="lesson.php?id=<?php echo $itemId; ?>">
  <select name="rating" required>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <input type="submit" value="Submit Rating">
</form>
<!-- HTML for social sharing buttons -->
<div>
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($lessonUrl); ?>" target="_blank" rel="noopener noreferrer">Share on Facebook</a>
  <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($lessonUrl); ?>&text=<?php echo urlencode($lessonTitle); ?>" target="_blank" rel="noopener noreferrer">Share on Twitter</a>
</div>
