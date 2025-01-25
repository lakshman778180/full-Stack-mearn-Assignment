
const password = prompt("Enter the Passwords");
let hasmunimumLength = password.length>=8;
let Uppercase = /[A-Z]/.test(password);
let hasNumber =/[0-9]/.test(password);
if(!hasmunimumLength){
  alert("Your password atlest 8 Character...");
  console.log("Your password atlest 8 character...");
}
else if(!Uppercase){
  alert("Your password later must be Uppercase later");
  console.log("Your password later must be upperCsae later");
}
else if(!hasNumber){
  alert("Your Password must be number:");
  console.log("Your password must be numner");
}
else{
  alert("Congratulation you are selected the correct password");
  console.log("Congratulation you are selected the correct password");
}
// code of && logical opreator 
