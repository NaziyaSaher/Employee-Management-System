// scripts.js

// Custom JavaScript functions can be added here if needed

// Example: Confirm deletion
function confirmDeletion() {
    return confirm("Are you sure you want to delete this employee?");
}

// Add event listener to delete buttons
document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll(".btn-danger");

    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            if (!confirmDeletion()) {
                event.preventDefault();
            }
        });
    });
});
