<!-- JavaScript for handling async event/request -->

document.body.onload = function() {
    //setInterval refresh for 5 seconds
    setInterval(getDataFromServer2, 5000)
}

function sendDeleteToServer2(contentFromDeleteBtn) {

    // Set up Ajax request
    let ajaxPostObj = new XMLHttpRequest()
    ajaxPostObj.open("POST", "includes/process_upload.php", true)
    ajaxPostObj.onreadystatechange = function() {
        if (ajaxPostObj.readyState == 4 && ajaxPostObj.status == 200) {
            console.log(ajaxPostObj.status)
        }
    }

    // Request header
    ajaxPostObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    // Send the data
    ajaxPostObj.send("delete_id=" + contentFromDeleteBtn)
}

// Ajax GET request example, to receive data from the server
function getDataFromServer2() {
    let infoBox = document.querySelector("#list-container");

    let ajaxObject = new XMLHttpRequest()

    ajaxObject.open("GET", "includes/process_upload.php?identifier=1", true)

    ajaxObject.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // get responseText of this Ajax object of server side data
            requestAnimationFrame(() => {
                infoBox.innerHTML = this.responseText;
                infoBox.innerHTML = infoBox.firstElementChild.innerHTML;
            });

        }
    }

    ajaxObject.send()
}