const search = document.querySelector('input[placeholder="wyszukaj użytkowników"]');
const leadersContainer = document.querySelector(".leaders");

search.addEventListener("keyup", function (event){
    function loadLeaders(leaders) {
        leaders.forEach(leader => {
            console.log(leader);
            //leader.getScore();
            //leader.username;
            createLeader(leader);
        })
    }

    function createLeader(leader){
        const template = document.querySelector("#leader-template");
        const clone = template.content.cloneNode(true);
        const username = clone.querySelector(".username");
        username.innerHTML = leader.username;
        const score = clone.querySelector(".score");
        console.log(leader.score);
        score.innerHTML = leader.score;
        leadersContainer.appendChild(clone);
    }

    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (leaders){
            leadersContainer.innerHTML = "";
            loadLeaders(leaders)
        })
    }
});