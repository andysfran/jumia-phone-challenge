const countrySelect = document.getElementById('countrySel');
const statusSelect = document.getElementById('statusSel');
const previousBtn = document.getElementById('previousBtn');
const nextBtn = document.getElementById('nextBtn');
let previousUrl = null;
let nextUrl = null;

const getPhoneList = (url = 'http://localhost:8000/api/phones') => {
    $.ajax({
        url: url,
        data: {
            country: countrySelect.value,
            status: statusSelect.value
        },
        beforeSend: () => {
            previousBtn.disabled = true;
            nextBtn.disabled = true;
        },
        success: (response) => {
            console.log("NEW DATA", response);
            if (typeof response === "object") {
                const phoneTable = document.getElementById('body_table_phone');

                //Remove all DOM elements of table
                while (phoneTable.firstChild) {
                    phoneTable.removeChild(phoneTable.firstChild);
                }

                const { data, next_page_url, prev_page_url } = response;
                console.log('entrou aqui', data)
                // Create the HTML element
                if (Array.isArray(data)) {
                    console.log('entrou aqui 2', data)
                    data.forEach((item) => {
                        let line = document.createElement('tr');

                        let countryColumn = document.createElement('td');
                        let country = document.createTextNode(item.country);
                        countryColumn.appendChild(country);

                        let stateColumn = document.createElement('td');
                        let state = document.createTextNode(item.isValid? 'OK' : 'NOK');
                        stateColumn.appendChild(state);

                        let countryCodeColumn = document.createElement('td');
                        let countryCode = document.createTextNode(item.countryCode);
                        countryCodeColumn.appendChild(countryCode);

                        let phoneNumberColumn = document.createElement('td');
                        let phoneNumber = document.createTextNode(item.phone);
                        phoneNumberColumn.appendChild(phoneNumber);

                        line.appendChild(countryColumn);
                        line.appendChild(stateColumn);
                        line.appendChild(countryCodeColumn);
                        line.appendChild(phoneNumberColumn);

                        phoneTable.appendChild(line);
                    });
                }

                // Update URL vars
                previousUrl = prev_page_url;
                nextUrl = next_page_url;

                // Disable control buttons if the url is empty
                if (!previousUrl) {
                    previousBtn.disabled = true;
                } else {
                    previousBtn.disabled = false;
                }

                if (!nextUrl) {
                    nextBtn.disabled = true;
                } else {
                    nextBtn.disabled = false;
                }

            } else {
                alert('Sorry, the data is unavailable now. Try again later.');
            }
        },
        error: (e) => {
            alert('Error on get the phone number list: '+e);
        }
    });
};


// Get the list of phone numbers
window.onload = () => {
    getPhoneList();
};

// Call the previous page
previousBtn.onclick = () => {
    if (previousUrl)
        getPhoneList(previousUrl);
};

// Call the next page
nextBtn.onclick = () => {
    if (nextUrl)
        getPhoneList(nextUrl);
};

// Change the country filter
countrySelect.onchange = () => {
    getPhoneList();
};

// Change the status filter
statusSelect.onchange = () => {
    getPhoneList();
};