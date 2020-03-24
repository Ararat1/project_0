class Validator {

    isName(string) {
        let pattern = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

        return Validator.validate(string, pattern);
    }

    isUsername(string) {
        let pattern = /^[a-zA-Z0-9_-]{3,16}$/;

        return Validator.validate(string, pattern);
    }

    isEmail(string) {
        let pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return Validator.validate(string, pattern);
    }

    isPassword(string) {
        if (string.length >= 6) {
            return true;
        }

        return false;
    }

    areTheSame(password1, password2) {
        if (password1 === password2) {
            return true;
        }

        return false;
    }

    static validate(string, pattern) {
        return pattern.test(string);
    }
}

$(document).ready(() => {
    const main = $('main');

    /* FORMS TOGGLE
    =============*/
    let buttonsWrapper = main.find('.tabs');

    buttonsWrapper.on('click', e => {
        let elem = e.target;

        if (elem.tagName === 'BUTTON') {
            const enableAndDisable = (enable, disable) => {
                // enable
                enable.removeClass('disabled');
                enable.addClass('enabled');
    
                // disable
                disable.removeClass('enabled');
                disable.addClass('disabled');
            }

            // forms
            let signin = main.find('.signin-form');
            let signup = main.find('.signup-form');

            if (elem.classList.contains('signin')) {
                enableAndDisable(signin, signup);
            } else if (elem.classList.contains('signup')) {
                enableAndDisable(signup, signin);
            }
        }
    });


    /* PASSWORD (INPUT TYPE) TOGGLE
    ================*/

    let passwordFields = main.find('.form .password');

    const addToggle = input/*=>DOM ELEM*/ => {
        let inputFieldType = input.getAttribute('type');

        if (inputFieldType == 'password') {
            input.setAttribute('type', 'text');
        } else {
            input.setAttribute('type', 'password');
        }
    }

    for (let i = 0; i < passwordFields.length; i++) {
        let input = passwordFields[i].querySelector('input'); // => DOM element
        let btn = passwordFields[i].querySelector('button.show'); // => DOM element

        btn.addEventListener('click', e => {
            addToggle(input);
        });
    }

    /* FORMS VALIDATION
    ==============*/
    // validator
    let validator = new Validator();

    // forms
    let signInForm = main.find('.signin-form form');
    let signUpForm = main.find('.signup-form form');

    let errorsMessageField = main.find('.forms .errors'),
        errorElement = errorsMessageField.find('p');

    const showError = errorMessage => {
        errorsMessageField.css("display", "flex");
        errorElement.html(errorMessage);
    };

    // validators
    const signInValidator = form => {
        let username = form['signin[username]'].value;
        let password = form['signin[password]'].value;

        // bool values
        let usernameValidate = validator.isUsername(username);
        let passwordValidate = validator.isPassword(password);

        // show messages
        if (!usernameValidate) {
            showError('Invalid username');
        } else if (!passwordValidate) {
            showError('Invalid password'); 
        };

        if (usernameValidate && passwordValidate) {
            return true;
        }

        return false;
    };

    const signUpValidator = form => {
        let name = form['signup[name]'].value;
        let username = form['signup[username]'].value;
        let email = form['signup[email]'].value;
        let password = form['signup[password]'].value;
        let passwordConfirm = form['signup[password-confirm]'].value;

        // bool values
        let nameValidate = validator.isName(name);
        let usernameValidate = validator.isUsername(username);
        let emailValidate = validator.isEmail(email);
        let passwordValidate = validator.isPassword(password);
        let passwordConfirmValidate = validator.areTheSame(password, passwordConfirm);

        // show error messages

        if (!nameValidate) {
            showError('Invalid name');
        } else if (!usernameValidate) {
            showError('Invalid username'); 
        } else if (!emailValidate) {
            showError('Invalid email');
        } else if (!passwordValidate) {
            showError('Invalid password');
        } else if (!passwordConfirmValidate) {
            showError('The passwords aren\'t match');
        }


        if (nameValidate && usernameValidate && emailValidate && passwordValidate && passwordConfirmValidate) {
            return true;
        }

        return false;
    };

    // forms submit event
    signInForm.on('submit', e => {
        e.preventDefault();

        let result = signInValidator(e.target);

        if (result) {
            e.target.submit();
        }
    });

    signUpForm.on('submit', e => {
        e.preventDefault();

        let result = signUpValidator(e.target);

        if (result) {
            e.target.submit();
        }
    });
});