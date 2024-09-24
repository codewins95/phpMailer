async function formSubmit(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    document.getElementById('loader').style.display = 'flex';

    const responseData = await fetch(event.target.action, {
        method: 'POST',
        body: formData,
    })
    const response =  await responseData.json()

    if(response.success){
        document.getElementById('loader').style.display = 'none';
        event.target.reset();
        Swal.fire({
            title: "Thank You",
            text: response.message,
            icon: "success"
          });
    }else{
        Swal.fire({
            title: "Whoops!",
            text: response.message,
            icon: "error"
          });
    }

}
