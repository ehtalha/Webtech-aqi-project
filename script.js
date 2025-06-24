const name = document.getElementById("name");
const email = document.getElementById("email");
const button = document.querySelector('button');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpass');
const country = document.getElementById('country');
const dob = document.getElementById("dob");
const favcolor = document.getElementById("favcolor");

const nameregx = /^[A-Za-z]+$/
const emailregx = /^\d{2}-\d{5}-\d@students\.aiub\.edu$/;
const passwordregx = /^[A-Za-z0-9]{8,}$/;
// const passwordlength = /^.{8,}$/;
const backgroundbox = document.getElementById("backgroundbox");

favcolor.addEventListener("input", function() {
    backgroundbox.style.backgroundColor = this.value;
});
button.addEventListener("click", () => {
    const inputname = name.value.trim();
    const inputemail = email.value;
    const passval = password.value.trim();
    const selectedCountry = country.value;
    const confirmpassval = confirmpassword.value.trim();
    if (!nameregx.test(inputname)) {
    alert("Not a valid name");
    }
    if (!emailregx.test(inputemail)) {
        alert("Give valid Email !!")
    }
    if (confirmpassval!= passval)
    {
        alert("Password not matched!!!")
    }
    if (!passwordregx.test(passval))
    {
        alert("No special charecter allowed && minimum 8 charecter required!!!");
    }
    if (!selectedCountry) {
        alert("Please select a country!");
        return;
    }

   

const dobValue = new Date(dob.value);
const today = new Date();

const agemili = today - dobValue;
const age = agemili / (1000 * 60 * 60 * 24 * 365.25);

    if (age < 18) {
        alert("You must be at least 18 years old to register.");
        return;
    }
})
