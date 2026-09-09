const loginForm = document.querySelector(".loginform");
loginForm.addEventListener("submit", function (event) {
    const username = document.querySelector('input[name="username"]').value.trim();
    const password = document.querySelector('input[name="password"]').value;
    if (username === "" || password === "") {
        event.preventDefault();
        alert("Please enter your username and password.");
        return;
    }
    console.log("Login form submitted.");
});
