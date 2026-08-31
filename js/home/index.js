// background script
const bg = new Image();
bg.src = "images/GSUJ4tFXoAAjUZe.webp";

if (document.body.dataset.randomBanner === "1") {
    const focusX = Math.random();
    const focusY = Math.random();

    const placeBanner = () => {
        if (!bg.naturalWidth || !bg.naturalHeight) {
            return;
        }

        const viewWidth = window.innerWidth;
        const viewHeight = window.innerHeight;
        const imageWidth = bg.naturalWidth;
        const imageHeight = bg.naturalHeight;

        const coverScale = Math.max(viewWidth / imageWidth, viewHeight / imageHeight);
        const scale = coverScale * 1.45;
        const drawnWidth = imageWidth * scale;
        const drawnHeight = imageHeight * scale;

        const offsetX = focusX * Math.max(0, drawnWidth - viewWidth);
        const offsetY = focusY * Math.max(0, drawnHeight - viewHeight);

        document.body.style.setProperty("--bg-size", `${drawnWidth}px ${drawnHeight}px`);
        document.body.style.setProperty("--bg-pos", `${-offsetX}px ${-offsetY}px`);
    };

    bg.addEventListener("load", placeBanner);
    window.addEventListener("resize", placeBanner);
}
// background script end
