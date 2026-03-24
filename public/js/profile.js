document.addEventListener("DOMContentLoaded", function () {


    const profileLink = document.getElementById("profileLink");
    const profileSection = document.getElementById("profileSection");
    const closeBtn = document.getElementById("closeProfile");

    // OPEN
    profileLink.addEventListener("click", function () {
        profileSection.classList.add("active");
    });

    // CLOSE (❌ button)
    closeBtn.addEventListener("click", function () {
        profileSection.classList.remove("active");
    });

    document.querySelector('.profile-card').addEventListener('click', function(e) {
    e.stopPropagation(); // ✅ भित्र click गर्दा close नहोस्
});

   document.querySelector(".edit-btn").addEventListener("click", function(e) {
    window.location.href = this.href;
});

});