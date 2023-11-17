// login.php js
document.addEventListener("DOMContentLoaded", function () {
    lottie.loadAnimation({
        container: document.getElementById("loginpage-lottie-container"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: "/assets/hmpage/login-anime.json",
    });
    console.log("Lottie animation loaded!");
    console.log("Container element:", document.getElementById("loginpage-lottie-container"));
});
