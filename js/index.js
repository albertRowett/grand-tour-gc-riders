// Highlight name of active page in navbar:
const links = document.querySelectorAll('nav a');
var url = window.location.href;
if (url.includes('?')) {
    url = url.slice(0, url.indexOf('?'));
}

links.forEach(link => {
    if (link.href === url) {
        link.style.backgroundColor = 'white';
        link.style.color = 'black';
    }
});

// Set error message offset when rider filters present- only applicable to index page:
const filters = document.querySelector('.filters');

if (filters) {
    setErrorMsgOffset();
    window.addEventListener('resize', setErrorMsgOffset);

    function setErrorMsgOffset() {
        const errorMsg = document.querySelector('.errorMsg');
        const filtersHeight = filters.offsetHeight;
        errorMsg.style.marginTop = `${filtersHeight}px`;
    }
}

// Rider form front-end validation- only applicable to add/edit rider pages:
const riderForm = document.querySelector('.riderForm');

if (riderForm) {
    const inputs = [
        'name',
        'image',
        'team',
        'nation',
        'dob',
        'giroGc',
        'tourGc',
        'vueltaGc',
        'giroStages',
        'tourStages',
        'vueltaStages'
    ];

    riderForm.addEventListener('submit', handleSubmit);

    function handleSubmit(submit) {
        const nameInput = document.querySelector('#name').value;
        const imageInput = document.querySelector('#image').value;
        const teamInput = document.querySelector('#team').value;
        const nationInput = document.querySelector('#nation').value;
        const dobInput = document.querySelector('#dob').value;
        const giroGcInput = document.querySelector('#giroGc').value;
        const tourGcInput = document.querySelector('#tourGc').value;
        const vueltaGcInput = document.querySelector('#vueltaGc').value;
        const giroStagesInput = document.querySelector('#giroStages').value;
        const tourStagesInput = document.querySelector('#tourStages').value;
        const vueltaStagesInput = document.querySelector('#vueltaStages').value;

        const trimmedName = nameInput.trim();
        const trimmedImage = imageInput.trim();
        const trimmedTeam = teamInput.trim();
        const trimmedNation = nationInput.trim();
        const dobRegex = /^(\d{4})-(\d{2})-(\d{2})$/;
        const giroGcInt = parseInt(giroGcInput);
        const tourGcInt = parseInt(tourGcInput);
        const vueltaGcInt = parseInt(vueltaGcInput);
        const giroStagesInt = parseInt(giroStagesInput);
        const tourStagesInt = parseInt(tourStagesInput);
        const vueltaStagesInt = parseInt(vueltaStagesInput);

        const invalidInputs = [];

        if (trimmedName === '' || trimmedName.length > 999) invalidInputs.push('name');
        if (trimmedImage === '' || trimmedImage.length > 999) invalidInputs.push('image');
        if (trimmedTeam === '' || trimmedTeam.length > 999) invalidInputs.push('team');
        if (trimmedNation === '' || trimmedNation.length > 999) invalidInputs.push('nation');
        if (!dobRegex.test(dobInput) || !isValidDate(dobInput)) invalidInputs.push('dob');
        if (!Number.isInteger(giroGcInt) || giroGcInt < 0 || giroGcInt > 255) invalidInputs.push('giroGc');
        if (!Number.isInteger(tourGcInt) || tourGcInt < 0 || tourGcInt > 255) invalidInputs.push('tourGc');
        if (!Number.isInteger(vueltaGcInt) || vueltaGcInt < 0 || vueltaGcInt > 255) invalidInputs.push('vueltaGc');
        if (!Number.isInteger(giroStagesInt) || giroStagesInt < 0 || giroStagesInt > 255) invalidInputs.push('giroStages');
        if (!Number.isInteger(tourStagesInt) || tourStagesInt < 0 || tourStagesInt > 255) invalidInputs.push('tourStages');
        if (!Number.isInteger(vueltaStagesInt) || vueltaStagesInt < 0 || vueltaStagesInt > 255) invalidInputs.push('vueltaStages');

        if (invalidInputs.length !== 0) {
            submit.preventDefault();
            document.querySelector('.validationErrorMsg').classList.remove('hidden');
            inputs.forEach(input => {
                const label = document.querySelector(`label[for="${input}"]`);
                label.style.color = invalidInputs.includes(input) ? 'red' : 'black';
            });
        }
    }

    function isValidDate(dateString) {
        const [year, month, day] = dateString.split('-').map(Number);
        const date = new Date(year, month - 1, day); // Month is zero-indexed in JS Date

        return date && date.getFullYear() === year && date.getMonth() + 1 === month && date.getDate() === day;
    }
}
