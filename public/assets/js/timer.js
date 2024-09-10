let timer;
let seconds = 1;

function formatTime(totalSeconds) {
    const hours = Math.floor(totalSeconds / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const secs = totalSeconds % 60;

    if (hours > 0) {
        return `${hours.toString().padStart(2, "0")}:${minutes
            .toString()
            .padStart(2, "0")}:${secs.toString().padStart(2, "0")}`;
    } else if (minutes > 0) {
        return `${minutes}:${secs.toString().padStart(2, "0")}`;
    } else {
        return `${secs} sec`;
    }
}

function startTimer() {
    timer = setInterval(() => {
        seconds++;
        console.log(seconds);
        document.getElementById("timer").innerText = formatTime(seconds);
        document.getElementById("duration").value = seconds;
    }, 1000);
}



function resetTimer() {
    clearInterval(timer);
    timer = null;
    seconds = 0;
    document.getElementById("timer").innerText = formatTime(seconds);
    // document.getElementById("duration").value = formatTime(seconds);
}
