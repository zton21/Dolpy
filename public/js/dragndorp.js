const { main } = require("@popperjs/core")
const { sortedIndexOf } = require("lodash")

let tasks = document.getElementsByClassName("task_card")
let toDo = document.getElementById("todo")
let onProgress = document.getElementById("onprogress")
let done = document.getElementById("done")


for(task of tasks){
    task.addEventListener("dragenter", function(e){
        let selected = e.target;
        console.log(selected);
        
        onProgress.addEventListener("dragover", function(e){
            e.preventDefault();
        });
        
        onProgress.addEventListener("drop", function(e){
            onProgress.appendChild(selected);
            selected = null;
        });

        done.addEventListener("dragover", function(e){
            e.preventDefault();
        });
        
        done.addEventListener("drop", function(e){
            done.appendChild(selected);
            selected = null;
        });

        toDo.addEventListener("dragover", function(e){
            e.preventDefault();
        });
        
        toDo.addEventListener("drop", function(e){
            toDo.appendChild(selected);
            selected = null;
        });
        
    })

}

