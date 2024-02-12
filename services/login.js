function login() {

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const formData = new FormData();
    formData.append('user', username);
    formData.append('pwd', password);

    axios.post('https://kakasualan.000webhostapp.com/login.php', formData).then(response => {
        console.log(response)
        
        if (response.data.status == 'success') {

            const sessionToken = response.data.session_token;
            localStorage.setItem('session_token', sessionToken);
            window.location.href = '../page/page-landing.php';
        } else {
            alert('Login failed. Please check your credentials');
        }
    })
        .catch(error => {
            console.error('Error during login:', error);
        });
}