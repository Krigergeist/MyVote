
function checkLogin(requiredRole = "user") {
    const isLoggedIn = localStorage.getItem("isLoggedIn");
    const role = localStorage.getItem("role");
    if (!isLoggedIn || (requiredRole && role !== requiredRole)) {
        window.location.href = "login.html";
    }
}

function login(e) {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "admin" && password === "admin") {
        localStorage.setItem("isLoggedIn", "true");
        localStorage.setItem("role", "admin");
        window.location.href = "admin-manage.html";
    } else {
        localStorage.setItem("isLoggedIn", "true");
        localStorage.setItem("role", "user");
        window.location.href = "voting.html";
    }
}

function register(e) {
    e.preventDefault();
    alert("Registrasi berhasil! Silakan login.");
    window.location.href = "login.html";
}

function vote(candidate) {
    if (localStorage.getItem("hasVoted") === "true") {
        window.location.href = "results.html";
        return;
    }
    localStorage.setItem("hasVoted", "true");
    localStorage.setItem("votedCandidate", candidate);
    window.location.href = "results.html";
}

function goBack() {
    window.history.back();
}
