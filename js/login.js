
    const usernameInput = document.getElementById('mail');
    const rememberCheckbox = document.getElementById('remember');

    window.onload = () => {
        const saved = localStorage.getItem('rememberedEmail');
        if (saved) {
            usernameInput.value = saved;
            rememberCheckbox.checked = true;
        }
    };

    function handleRememberMe() {
        rememberCheckbox.checked
            ? localStorage.setItem('rememberedEmail', usernameInput.value)
            : localStorage.removeItem('rememberedEmail');
    }
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }