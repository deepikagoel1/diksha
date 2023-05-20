<?php
// Include the necessary files and establish database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $questions = $_POST['questions'];

  // Save the assessment
  $sql = "INSERT INTO assessments (lesson_id, title, description, created_at, updated_at) VALUES (:lesson_id, :title, :description, NOW(), NOW())";
  // Execute the SQL statement and save the assessment ID

  // Save the questions
  foreach ($questions as $question) {
    $questionText = $question['question'];
    $questionType = $question['type'];
    $options = $question['options'];
    $correctOption = $question['correct_option'];

    // Save the question
    $sql = "INSERT INTO questions (assessment_id, question_text, question_type, created_at, updated_at) VALUES (:assessment_id, :question_text, :question_type, NOW(), NOW())";
    // Execute the SQL statement and save the question ID

    // Save the options
    foreach ($options as $option) {
      $optionText = $option['text'];
      $isCorrect = ($correctOption === $option['id']) ? 1 : 0;

      // Save the option
      $sql = "INSERT INTO options (question_id, option_text, is_correct, created_at, updated_at) VALUES (:question_id, :option_text, :is_correct, NOW(), NOW())";
      // Execute the SQL statement
    }
  }

  // Redirect to the lesson page or a success message
}
?>

<!-- HTML form for assessment creation -->
<form method="POST" action="create_assessment.php">
  <label>Title:</label>
  <input type="text" name="title" required><br>

  <label>Description:</label>
  <textarea name="description" required></textarea><br>

  <label>Questions:</label>
  <div id="questions-container">
    <!-- JavaScript code will dynamically add question fields here -->
  </div>

  <button type="button" onclick="addQuestion()">Add Question</button>
  <input type="submit" value="Save Assessment">
</form>

<script>
// JavaScript code to dynamically add question fields
function addQuestion() {
  // Create question fields and append them to the questions container
}
</script>
