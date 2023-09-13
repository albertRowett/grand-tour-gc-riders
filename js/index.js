document.querySelector('.addRiderForm').addEventListener('submit', handleSubmit)

function handleSubmit(submit) {
    submit.preventDefault()
    const nameInput = document.querySelector('#name').value
    const imageInput = document.querySelector('#image').value
    const teamInput = document.querySelector('#team').value
    const nationalityInput = document.querySelector('#nationality').value
    const dobInput = document.querySelector('#dob').value

    if (
        nameInput === '' ||
        imageInput === '' ||
        teamInput === '' ||
        nationalityInput === '' ||
        dobInput === ''
    ) {
        document.querySelector('.errorMessage').classList.remove('hidden')
    }
}