document.getElementById("but").addEventListener("click", () => {
    console.log(true)
    if(document.getElementById("nach").value !== "" || document.getElementById("kon").value !== "") {
        let nach = document.getElementById("nach").value.split(":")
        let kon = document.getElementById("kon").value.split(":")
        if(kon[1] > nach[1]) {
            let min = kon[1] - nach[1]
            let hour = kon[0] - nach[0]
            document.getElementById("itog").innerHTML = `<p>${hour-1} часов --- ${60-min} минут</p>`
        } else {
            let min = nach[1] - kon[1]
            let hour = kon[0] - nach[0]
            document.getElementById("itog").innerHTML = `<p>${hour} часов --- ${min} минут</p>`
        }
    }
})