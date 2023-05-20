// Example JavaScript code

// Get a reference to an HTML element
var button = document.getElementById("myButton");

// Add an event listener to the button
button.addEventListener("click", function() {
  // Perform an action when the button is clicked
  alert("Button clicked!");
});

// Manipulate the DOM
var paragraph = document.getElementById("myParagraph");
paragraph.innerHTML = "This is a dynamically updated paragraph.";

// Make an AJAX request
var xhr = new XMLHttpRequest();
xhr.open("GET", "data.json", true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    console.log(response);
  }
};
xhr.send();
