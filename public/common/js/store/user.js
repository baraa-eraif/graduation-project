const AUTH_USER = 'user_auth';

const AUTH_TOKEN = 'user_token';


function setAuth(user) {
    localStorage.setItem(AUTH_USER, user);
}

function getAuth() {
    localStorage.getItem(AUTH_USER);
}


function setToken(token) {
    localStorage.setItem(AUTH_TOKEN, token);
}

function getToken() {
    localStorage.getItem(AUTH_TOKEN);
}
