document.getElementById("registrationForm").addEventListener("submit", function (e) {
    e.preventDefault();
  
    const name = document.getElementById("regFullname").value.trim();
    const email = document.getElementById("regEmail").value.trim();
    const password = document.getElementById("regPassword").value;
    const cPassword = document.getElementById("regcPassword").value;
    const location = document.getElementById("Location").value.trim();
    const zip = document.getElementById("Zip").value.trim();
    const city = document.getElementById("LOPcity").value;
    const termsChecked = document.getElementById("checkbox").checked;
  
    const nameRegex = /^[A-Za-z\s]+$/;
    const emailRegex = /^\d{2}-\d{5}-\d@students\.aiub\.edu$/;
    const zipRegex = /^\d{4}$/;
  
    if (!name || !email || !password || !cPassword || !location || !zip || !city) {
      alert("All fields must be filled.");
      return;
    }
  
    if (!nameRegex.test(name)) {
      alert("Name should not contain special characters or numbers.");
      return;
    }
  
    if (!emailRegex.test(email)) {
      alert("Email must be in the format: 22-47402-2@students.aiub.edu");
      return;
    }
  
    if (password !== cPassword) {
      alert("Passwords do not match.");
      return;
    }
  
    if (!zipRegex.test(zip)) {
      alert("Zip code must be exactly 4 digits.");
      return;
    }
  
    if (!termsChecked) {
      alert("You must agree to the Terms and Conditions.");
      return;
    }
  
    alert("Registration Successful!");
  });
  
  document.getElementById("bgColor").addEventListener("input", function () {
    document.getElementById("regBox").style.backgroundColor = this.value;
  });
  