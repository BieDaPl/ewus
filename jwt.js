document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // prevent the form from reloading the page

    // get the value of the input field
    const inputValue = document.getElementById("inputField").value;

    // send an AJAX request to a PHP script
    fetch("/ewus-check.php", {
        method: "POST",
        body: `inputField=${inputValue}`
    })
        .then(function(response) {
            // handle the response from the PHP script
        });
});