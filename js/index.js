// addRider form front-end validation
document.querySelector('.riderForm').addEventListener('submit', handleSubmit)

function handleSubmit(submit) {
    const nameInput = document.querySelector('#name').value
    const imageInput = document.querySelector('#image').value
    const teamInput = document.querySelector('#team').value
    const nationInput = document.querySelector('#nation').value
    const dobInput = document.querySelector('#dob').value

    if (
        nameInput === '' ||
        imageInput === '' ||
        teamInput === '' ||
        nationInput === '' ||
        dobInput === ''
    ) {
        submit.preventDefault()
        document.querySelector('.validationError').classList.remove('hidden')
    }
}
