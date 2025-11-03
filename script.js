const form = document.querySelector('form');

function parseDate(value){
    const [y, m, d] = value.split('-').map(Number);
    return new Date(y, m - 1, d);
}

form.addEventListener('submit', (e) => {
    const sd = document.getElementById('sd').value;
    const ed = document.getElementById('ed').value;

    const today = new Date();
    today.setHours(0,0,0,0);
    
    const sdDate = parseDate(sd);
    const edDate = parseDate(ed);

    if (sdDate > edDate) {
        e.preventDefault();
        alert("Start date cannot be later than end date.");
        return;
    }

    if (sdDate < today) {
        e.preventDefault();
        alert("Start date cannot be in the past.");
        return;
    }

    if (edDate < today) {
        e.preventDefault();
        alert("End date cannot be in the past.");
        return;
    }
});