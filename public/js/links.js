// Get all <li> elements inside the sidebar
var sidebarLinks = document.querySelectorAll('#list-container li');

// Loop through each <li> element
sidebarLinks.forEach(function (link) {
    // Add click event listener to each <li>
    link.addEventListener('click', function () {
        // Get the <a> element inside the clicked <li>
        var anchor = this.querySelector('a');
        // Check if the <a> element exists
        if (anchor) {
            // Navigate to the href of the <a> element
            window.location.href = anchor.getAttribute('href');
        }
    });
});
