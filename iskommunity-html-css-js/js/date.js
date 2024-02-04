function getCurrentDate(){
    const currentDate = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);
    return formattedDate;
}

document.getElementById('date').textContent = 'Today is ' + getCurrentDate();

ClassicEditor.create(document.querySelector("#editor"), {
    toolbar: [
        "heading",
        "|",
        "bold",
        "italic",
        "link",
        "bulletedList",
        "numberedList",
        "blockQuote"
    ],
    
    }).catch(error => {
    console.log(error);
    });

    function toggleMembership() {
        var membershipSection = document.getElementById("membershipSection");
        var statusMembershipBtn = document.getElementById("status-membership");
        var status = document.getElementById("status");
        var statusDiv = document.getElementById("status-div");

        if (membershipSection.style.display === "none" || membershipSection.style.display === "") {
            membershipSection.style.display = "block";
            statusDiv.style.marginBottom = '1.5rem';
            status.innerText = "Membership Status: OPEN";
            statusMembershipBtn.innerText = "Close Membership Application";
        } else {
            membershipSection.style.display = "none";
            statusDiv.style.marginBottom = '0';
            status.innerText = "Membership Status: CLOSED";
            statusMembershipBtn.innerText = "Open Membership Application";
        }
    }