var gitEl = document.getElementById("gitPanel");

function updateGithubEvents(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			var gitData = JSON.parse(xhr.responseText);
			updateGithubElement(gitData);
		}
	};
	xhr.open("GET", "https://api.github.com/users/7thStringofZhef/events",true);
	xhr.send();
}

//Update my element with 5 most recent events
function updateGithubElement(gitData){
	//Get the fields I need
	gitData = gitData.slice(0,5);
	var gitRepos = new Array();
	var gitTimes = new Array();
	var gitCommitMessages = new Array();
	
	for(var gitIndex = 0; gitIndex < 5; gitIndex++){
		gitRepos.push(gitData[gitIndex].repo.name);
		gitTimes.push(gitData[gitIndex].created_at);
		
		gitCommitMessages.push(new Array());
		
		if(gitData[gitIndex].payload.hasOwnProperty("commits")){
			var commits = gitData[gitIndex].payload.commits;
			for(var commitIndex = 0; commitIndex < commits.length; commitIndex++){
				gitCommitMessages[gitIndex].push(commits[commitIndex].message);
			}
		}
	}
	
	//Clear the element
	gitEl.innerHTML = "";
	
	//Update the element
	var reHead = document.createElement("h2");
	reHead.innerHTML = "Recent Coding Updates";
	gitEl.appendChild(reHead);
	
	for(var gitIndex = 0; gitIndex < 5; gitIndex++){
		var newP = document.createElement("p");
		var pString = "Made a commit to " + gitRepos[gitIndex] + " at " + gitTimes[gitIndex];
		pString += " Details: ";
		for(var commitIndex = 0; commitIndex < gitCommitMessages[gitIndex].length; commitIndex++){
			pString += gitCommitMessages[gitIndex][commitIndex] + " ";
		}
		newP.innerHTML = pString;
		gitEl.appendChild(newP);
	}
	
	
}
