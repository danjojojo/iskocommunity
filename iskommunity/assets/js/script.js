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
