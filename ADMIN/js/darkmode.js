const darkModeToggle = document.getElementById("darkModeToggle");

// Check for saved user preference in local storage
if (localStorage.getItem("darkMode") === "enabled") {
    document.body.classList.add("dark-mode");
}

// Toggle dark mode
darkModeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    
    // Save preference to local storage
    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("darkMode", "enabled");
    } else {
        localStorage.setItem("darkMode", "disabled");
    }
});

