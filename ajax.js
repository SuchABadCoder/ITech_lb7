try {
    ajax = new XMLHttpRequest(); 
    } catch(e) { ajax = 0; }

function workersCount()
{
    var chiefName = document.getElementById('chief').value;

    ajax.onload = () => {
        let placeholder = document.getElementById("placeholder-workers-count");

        let response = JSON.parse(ajax.responseText);
   
        if(response==null)
            return;

        let p = document.createElement('p');
        p.innerText = "Число сотрудников отдела руководителя " + chiefName + ": " + response[0];
        placeholder.appendChild(p);
    }

    ajax.open('GET',`workers_count.php?chiefName=${chiefName}`);
    ajax.send();
}

function workDuration()
{
    var projectName = document.getElementById('project_name').value;

    ajax.onload = () => {
        let placeholder = document.getElementById("placeholder-work-duration");

        let response = ajax.responseXML.getElementsByTagName('totalTime');

        if(response==null)
            return;

        let p = document.createElement('p');
        p.innerText = "Oбщее время работы над проектом " + projectName + ": " + response[0].textContent;
        placeholder.appendChild(p);
    }

    ajax.open('GET', `work_duration.php?project_name=${projectName}`);
    ajax.send()
}

function taskInfo()
{
     var projectName2 = document.getElementById('project_name2').value;
     var date = document.getElementById('date').value;

     ajax.onload = () => {
         document.getElementById('placeholder-tasks-info').innerHTML = ajax.responseText;
     }

     ajax.open('GET',`task_info.php?projectName2=${projectName2}&date=${date}`);
     ajax.send();
} 