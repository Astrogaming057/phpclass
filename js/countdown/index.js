const pad = (value) => String(value).padStart(2, "0");
const raw = document.getElementById("countdown-data");

if (raw) {
    const data = JSON.parse(raw.textContent);
    const end = data.end_ts * 1000;
    const offset = data.server_ts * 1000 - Date.now();
    const done = document.querySelector("[data-countdown-done]");

    const serverNow = () => Date.now() + offset;
    const tick = () => {
        const distance = Math.max(0, end - serverNow());

            document.querySelector('[data-unit="days"]').textContent = String(Math.floor(distance / 86400000));
        document.querySelector('[data-unit="hours"]').textContent = pad(Math.floor((distance % 86400000) / 3600000));
        document.querySelector('[data-unit="minutes"]').textContent = pad(Math.floor((distance % 3600000) / 60000));
        document.querySelector('[data-unit="seconds"]').textContent = pad(Math.floor((distance % 60000) / 1000));

        if (done) {
            done.hidden = distance !== 0;
        }
    };

    tick();
    setInterval(tick, 1000);
}
