document.querySelector('.addRiderForm').addEventListener('submit', handleSubmit)

function handleSubmit(submit) {
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
        submit.preventDefault()
        document.querySelector('.errorMessage').classList.remove('hidden')
    }
}