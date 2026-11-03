let items = [ // Create an empty array to store the JSON data in later
    {
        location: "", date: "", id: ""
    }
]

/* Old method of fetching JSON data
fetch('./tickets.json')
    .then((response) => response.json())
    .then((json) => {
        items = json
        loadSearch("")
    })
*/

// Fetch JSON data from the PHP script
fetch('search_request.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then((json) => {
        items = json
        loadSearch("")
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });

const searchInput = document.getElementById("search-tickets")
const div = document.getElementById("ticket-fill")

function loadSearch() {
    // Empty the div before adding new elements
    div.innerHTML = ""
    // Filter the search input value to the items in the array and call the addDiv function for each item that matches
    items.filter(i => i.location.toLowerCase().includes(searchInput.value.toLowerCase())).forEach(addDiv);
}

// This function adds a div to the ticket-fill div with the location, date and a button to buy a ticket
function addDiv (i) {
    let buyBtnValue
    if (!checkDate(i.date)) {
        buyBtnValue = "Buy"
    } else {
        buyBtnValue = "Event Over"
    }
    const template =
        `
            <h3>${i.location}</h3>
            <p>Date: ${i.date}</p>
            <button class="buybtn">${buyBtnValue}</button>
        `
    const newDiv = document.createElement("div")
    newDiv.classList.add("ticket-segment")
    newDiv.innerHTML = template
    let buyBtn = newDiv.getElementsByTagName("button")[0]
    buyBtn.disabled = checkDate(i.date) // Disable the button if the date is in the past
    // disabled expects a boolean so we can use the checkDate function to return a boolean value
    buyBtn.addEventListener("click", () => {
        if (!checkDate(i.date)) {
            window.location.href = `buy_tickets.php?id=${i.id}` // Redirect to the ticket page with the id as a query parameter
        }
    })
    div.append(newDiv)
}

// Function to check if the date is in the past
// Returns true if the date is in the past
function checkDate(dateString) {
    // Parse the date string (assumes format DD.MM.YYYY)
    // This Const takes Day, Month and Year from the dateString and converts them to numbers
    const [day, month, year] = dateString.split('.').map(Number);
    const inputDate = new Date(year, month - 1, day) // JavaScript months are 0-indexed
    // Date is in the format YYYY MM DD and an inbuilt function is used to convert it to a date object

    // Get the current date without the time component
    const today = new Date()
    today.setHours(0, 0, 0, 0) // Set the hours, minutes, seconds and milliseconds to 0 to compare only the date

    return inputDate < today // Returns true if the input date is before today
}

// EventListener for search input
searchInput.addEventListener("input", loadSearch)