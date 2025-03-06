
let todo = [];

let req = prompt("Please enter the your request");
while(true){
  if(req=="quit"){
    console.log("Quiting the game");
    break;
  }
if(req =="list"){
  console.log("---------");
  for(let i =0; i<todo.length;i++){
    console.log(i,todo[i]);
  }
  console.log("---------");
}
  else if(req=="add"){
    let task = prompt("please enter the task you want to add");
    todo.push(task);
    console.log("task is added");
  }
  else if(req=="delete"){
    let idx = prompt("Please enter the task index:");
    todo.slice(idx,1);
    console.log("task is deleted:");
  }
  else{
    console.log("wrong request user:");
  }
  let req = prompt("Please enter the your request");
}
