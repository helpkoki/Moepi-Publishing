import { getWebsiteData } from './model.js';  // Importing the model

// Function to populate fields
function populateFields(data) {
    document.getElementById('websiteName').value = data.name;
    document.getElementById('visitSite').value = data.site;
    document.getElementById('username').value = data.username;
    document.getElementById('cpanelUrl').value = data.cPanelUrl;
}

// Function to clear all fields
function clearFields() {
    document.getElementById('websiteName').value = '';
    document.getElementById('visitSite').value = '';
    document.getElementById('username').value = '';
    document.getElementById('cpanelUrl').value = '';
}

// Adding event listeners to buttons
document.querySelector('.btn-group').addEventListener('click', (e) => {
    const buttonText = e.target.innerText;
    const websites = getWebsiteData();

    switch(buttonText) {
        case 'Moepi Publishing':
            populateFields(websites.moepi);
            break;
        case 'Tekete':
            populateFields(websites.tekete);
            break;
        case 'Bathobelacan':
            alert('No data available for Bathobelacan');
            break;
        case 'MTI':
            alert('No data available for MTI');
            break;
        default:
            break;
    }
    console.log("worked");
});


// Move to cPanel event listener
document.querySelector('.cPaneldClick').addEventListener('click', (e) => {
    const url = document.getElementById('cpanelUrl').value;  // Get the cPanel URL from the input field

    if (url) {
        window.location.href = url;  // Redirect to the URL if it exists
    } else {
        alert("Please enter a valid cPanel URL.");
    }
});



// Clear button event listener
document.querySelector('.d-grid button').addEventListener('click', clearFields);

// Exit button event listener
document.querySelectorAll('.d-grid button')[1].addEventListener('click', () => {
    window.close();  // Close the window
});
