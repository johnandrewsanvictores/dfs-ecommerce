const Login_Form = (function() {
    const login_form = document.querySelector(".login-form form");
    const toggle_password_btn = document.querySelector(".toggle-password");

    function add_events() {
        login_form.addEventListener('submit', submit_data);
        
        // Add password toggle event
        toggle_password_btn.addEventListener('click', toggle_password_visibility);
    }

    function toggle_password_visibility(e) {
        const password_input = e.target.previousElementSibling;
        const type = password_input.type === 'password' ? 'text' : 'password';
        password_input.type = type;
        e.target.classList.toggle('fa-eye');
        e.target.classList.toggle('fa-eye-slash');
    }

    function submit_data(e) {
        e.preventDefault();

        if(Form_Validation.validate_login()){
            // For now, just show success message
            alert('Form is valid! Ready for backend integration.');
        }

        Form_Validation.rmv_error_msg_on_data_change();
    }

    return {
        add_events
    }
})();

const Form_Validation = (function() {
    function show_error(element, message) {
        remove_error(element);
        const error_div = document.createElement('div');
        error_div.className = 'error-message';
        error_div.style.color = 'red';
        error_div.style.fontSize = '10px';
        error_div.style.marginTop = '4px';
        error_div.textContent = message;
        
        element.parentNode.appendChild(error_div);
        element.style.borderColor = 'red';
    }

    function remove_error(element) {
        const error = element.parentNode.querySelector('.error-message');
        if (error) {
            error.remove();
            element.style.borderColor = '';
        }
    }

    function validate_login() {
        let is_valid = true;

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(error => error.remove());

        // Username validation
        const username = document.querySelector('#username');
        if (!username.value.trim()) {
            show_error(username, 'Username is required');
            is_valid = false;
        } else if (username.value.length < 3) {
            show_error(username, 'Username must be at least 3 characters');
            is_valid = false;
        }

        // Password validation
        const password = document.querySelector('#password');
        if (!password.value) {
            show_error(password, 'Password is required');
            is_valid = false;
        } else if (password.value.length < 8) {
            show_error(password, 'Password must be at least 8 characters');
            is_valid = false;
        }

        return is_valid;
    }

    function rmv_error_msg_on_data_change() {
        const form_inputs = document.querySelectorAll('.login-form form input');
        
        form_inputs.forEach(input => {
            input.addEventListener('input', function() {
                remove_error(this);
            });
        });
    }

    return {
        validate_login,
        rmv_error_msg_on_data_change
    }
})();

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
    Login_Form.add_events();
});
