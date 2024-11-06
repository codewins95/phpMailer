async function formSubmit(event) {
    event.preventDefault();
    console.log(event.target);    
    
    const formData = new FormData(event.target);
    document.getElementById('loader2').style.display = 'flex';

    try {
        const response = await axios.post(event.target.action, formData);
        console.log(response.data);

        if (response.data.success) {
            document.getElementById('loader2').style.display = 'none';
            event.target.reset();
            Swal.fire({
                title: "Thank You",
                text: response.data.message,
                icon: "success"
            });
        } else {
            Swal.fire({
                title: "Whoops!",
                text: response.data.message,
                icon: "error"
            });
        }
    } catch (error) {
        console.error(error);
        document.getElementById('loader2').style.display = 'none';
        Swal.fire({
            title: "Error!",
            text: "An error occurred while submitting the form.",
            icon: "error"
        });
    }
}
