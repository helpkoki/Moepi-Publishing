import { getWebsiteData } from './model.js';

function populateFields(data) {
    document.getElementById('websiteName').value = data.name;
    document.getElementById('visitSite').value = data.site;
    document.getElementById('username').value = data.username;
    document.getElementById('cpanelUrl').value = data.cPanelUrl;
}

function clearFields() {
    document.getElementById('websiteName').value = '';
    document.getElementById('visitSite').value = '';
    document.getElementById('username').value = '';
    document.getElementById('cpanelUrl').value = '';
}

document.getElementById('moepiBtn').addEventListener('click', () => {
    const websites = getWebsiteData();
    populateFields(websites.moepi);
});

document.getElementById('teketeBtn').addEventListener('click', () => {
    const websites = getWebsiteData();
    populateFields(websites.tekete);
});

document.getElementById('clearBtn').addEventListener('click', clearFields);

document.getElementById('exitBtn').addEventListener('click', () => {
    window.close(); // Closes the window
});
